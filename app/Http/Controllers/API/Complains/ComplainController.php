<?php

namespace App\Http\Controllers\API\Complains;

use App\Exportable\ExportComplaints;
use App\Http\Requests\Complains\ComplainStoreRequest;
use App\Http\Resources\Complains\ComplainResource;
use App\Models\Complains\Complain;
use App\Models\Metrics\Theme;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class ComplainController extends Controller
{
    // TODO create route to export complains

    protected function filter(Request $request)
    {
        if (
            $request->query('start_date') &&
            $request->query('end_date')
        ) {

            $start_date = new Carbon($request->query('start_date'));
            $end_date = new Carbon($request->query('end_date'));

            if ($start_date->equalTo($end_date)) {
                $records = Complain::whereDate('complains.created_at', '=', $start_date->toDateString())
                    ->orderBy('complains.created_at', 'desc');

            } else {
                $records = Complain::whereBetween('complains.created_at',
                    [
                        (new Carbon($start_date))->toDateString(),
                        (new Carbon($end_date))->toDateString(),
                    ])->orderBy('complains.created_at', 'desc');
            }
        } else {
            $records = Complain::orderBy('complains.created_at', 'desc');
        }

        if ($request->query('municipalities')) {
            $municipalities = explode(',', $request->query('municipalities'));
            $records = $records->whereIn(
                'complains.municipality_id',
                $municipalities)->orderBy('complains.created_at', 'desc'
            );
        }

        if ($request->query('themes')) {
            $themes = explode(',', $request->query('themes'));
            $records = $records->whereIn(
                'complains.theme_id',
                $themes)->orderBy('complains.created_at', 'desc');
        }
        return $records;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $records = $this->filter($request);
        return ComplainResource::collection(
            $records->paginate()
        //Complain::orderBy('created_at', 'desc')->paginate()
        );
    }

    public function export(Request $request)
    {
        $records = $this->filter($request);
        $records = $records
            ->join('theme_translations', 'complains.theme_id', '=', 'theme_translations.theme_id')
            ->where('theme_translations.locale', '=', App::getLocale())
            ->join('municipality_translations', 'municipality_translations.municipality_id', '=', 'complains.municipality_id')
            ->where('municipality_translations.locale', '=', App::getLocale())
            ->join('contacts', 'complains.contact_id', '=', 'contacts.id')
            ->select(DB::raw(
                '
                complains.id,
                complains.created_at as date,
                contacts.name as name,
                contacts.phone_number as phone_number,
                contacts.email as email,
                contacts.address as address,
                theme_translations.name as theme, 
                municipality_translations.name as municipality,
                complains.subject, 
                complains.description, 
                complains.is_valid, 
                complains.is_moderated
                '
            ))
            ->get();
        $records->map(function ($element) {
            $element->name = decrypt($element->name);
            $element->email = ($element->email ? decrypt($element->email) : $element->email);
            $element->phone_number = ($element->phone_number ? decrypt($element->phone_number) : $element->phone_number);
            $element->address = ($element->address ? decrypt($element->address) : $element->address);
            return $element;
        });
        $export = new ExportComplaints($records);
        return Excel::download($export, 'complaints.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ComplainStoreRequest $request
     * @return JsonResponse
     */
    public function store(ComplainStoreRequest $request)
    {
        $record = new Complain();
        $params = $request->only([
            'subject',
            'description',
            'longitude',
            'latitude',
            'is_new',
            'is_moderated',
            'is_valid',
            'has_approved_sworn_statement',
            'has_approved_term_of_use',
            'theme_id',
            'contact_id',
            'municipality_id',
        ]);

        if (!$request->get('subject')) {
            $params['subject'] = (Theme::find($params['theme_id']))->name;
        }

        $record->fill($params);

        $record->save();

        $data = [
            'message' => 'record created successfully',
            'code' => JsonResponse::HTTP_CREATED,
            'data' => new ComplainResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return ComplainResource
     */
    public function show($id)
    {
        $record = Complain::findOrFail($id);
        return new ComplainResource(
            $record
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = Complain::findOrFail($id);

        $params = $request->only([
            'subject',
            'description',
            'longitude',
            'latitude',
            'is_new',
            'is_moderated',
            'is_valid',
            'has_approved_sworn_statement',
            'has_approved_term_of_use',
            'theme_id',
            'contact_id',
            'municipality_id',
        ]);

        $record->fill([
            $params,
        ]);

        $record->save();

        $data = [
            'message' => 'record updated successfully',
            'code' => JsonResponse::HTTP_OK,
            'data' => new ComplainResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Complain::findOrFail($id);

        $record->delete();

        $data = [
            'message' => 'record deleted successfully',
            'code' => JsonResponse::HTTP_NO_CONTENT
        ];

        return response()->json($data, JsonResponse::HTTP_NO_CONTENT);
    }
}
