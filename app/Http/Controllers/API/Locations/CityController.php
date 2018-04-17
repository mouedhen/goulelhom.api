<?php

namespace App\Http\Controllers\API\Locations;

use App\Http\Requests\Locations\CityStoreRequest;
use App\Http\Resources\Locations\CityResource;
use App\Models\Locations\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return CityResource::collection(
            City::paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CityStoreRequest $request
     * @return JsonResponse
     */
    public function store(CityStoreRequest $request)
    {
        $record = new City();
        $transParams = $request->only(['name', 'description',]);
        $params = $request->only(['population', 'longitude', 'latitude', 'country_id']);

        $record->fill([
            App::getLocale() => $transParams,
            $params,
        ]);

        $record->save();

        $data = [
            'message' => 'record created successfully',
            'code' => JsonResponse::HTTP_CREATED,
            'data' => new CityResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return CityResource
     */
    public function show($id)
    {
        $record = City::findOrFail($id);
        return new CityResource(
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
        $record = City::findOrFail($id);
        $transParams = $request->only(['name', 'description',]);
        $params = $request->only(['population', 'longitude', 'latitude', 'country_id']);

        $record->fill([
            App::getLocale() => $transParams,
            $params,
        ]);

        $record->save();

        $data = [
            'message' => 'record updated successfully',
            'code' => JsonResponse::HTTP_OK,
            'data' => new CityResource($record),
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
        $record = City::findOrFail($id);

        $record->delete();

        $data = [
            'message' => 'record deleted successfully',
            'code' => JsonResponse::HTTP_NO_CONTENT
        ];

        return response()->json($data, JsonResponse::HTTP_NO_CONTENT);
    }
}
