<?php

namespace App\Http\Controllers\API\Locations;

use App\Http\Requests\Locations\CountryStoreRequest;
use App\Http\Resources\Locations\CountryResource;
use App\Models\Locations\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return CountryResource::collection(
            Country::paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CountryStoreRequest $request
     * @return JsonResponse
     */
    public function store(CountryStoreRequest $request)
    {
        $record = new Country();
        $transParams = $request->only(['name', 'description',]);
        $params = $request->only(['population', 'longitude', 'latitude']);

        $record->fill([
            App::getLocale() => $transParams,
            $params,
        ]);

        $record->fill($params);

        $record->save();

        $data = [
            'message' => 'record created successfully',
            'code' => JsonResponse::HTTP_CREATED,
            'data' => new CountryResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return CountryResource
     */
    public function show($id)
    {
        $record = Country::findOrFail($id);
        return new CountryResource(
            $record
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = Country::findOrFail($id);

        $transParams = $request->only(['name', 'description',]);
        $params = $request->only(['population', 'longitude', 'latitude']);

        $record->fill([
            App::getLocale() => $transParams,
            $params,
        ]);

        $record->save();

        $data = [
            'message' => 'record updated successfully',
            'code' => JsonResponse::HTTP_OK,
            'data' => new CountryResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Country::findOrFail($id);

        $record->delete();

        $data = [
            'message' => 'record deleted successfully',
            'code' => JsonResponse::HTTP_NO_CONTENT
        ];

        return response()->json($data, JsonResponse::HTTP_NO_CONTENT);
    }
}
