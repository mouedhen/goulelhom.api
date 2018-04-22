<?php

namespace App\Http\Controllers\API\Complains;

use App\Http\Requests\Complains\ComplainStoreRequest;
use App\Http\Resources\Complains\ComplainResource;
use App\Models\Complains\Complain;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ComplainController extends Controller
{
    // TODO create route to export complains

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ComplainResource::collection(
            Complain::paginate()
        );
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
