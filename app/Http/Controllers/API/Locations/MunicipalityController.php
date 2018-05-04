<?php

namespace App\Http\Controllers\API\Locations;

use App\Http\Requests\Locations\MunicipalityStoreRequest;
use App\Http\Resources\Locations\MunicipalityResource;
use App\Models\Locations\Municipality;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class MunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return MunicipalityResource::collection(
            Municipality::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MunicipalityStoreRequest $request
     * @return JsonResponse
     */
    public function store(MunicipalityStoreRequest $request)
    {
        $record = new Municipality();
        $transParams = $request->only(['name', 'description',]);
        $params = $request->only([
            'population', 'houses', 'regional_council_number', 'municipal_council_number',
            'website', 'phone', 'email', 'fax',
            'longitude', 'latitude', 'city_id', 'is_active',
        ]);

        $record->fill([
            App::getLocale() => $transParams,
        ]);

        $record->fill($params);

        $record->save();

        $data = [
            'message' => 'record created successfully',
            'code' => JsonResponse::HTTP_CREATED,
            'data' => new MunicipalityResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return MunicipalityResource
     */
    public function show($id)
    {
        $record = Municipality::findOrFail($id);
        return new MunicipalityResource(
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
        $record = Municipality::findOrFail($id);
        $transParams = $request->only(['name', 'description',]);
        $params = $request->only([
            'population', 'houses', 'regional_council_number', 'municipal_council_number',
            'website', 'phone', 'email', 'fax',
            'longitude', 'latitude', 'city_id', 'is_active',
        ]);

        $record->fill([
            App::getLocale() => $transParams,
            $params,
        ]);

        $record->save();

        $data = [
            'message' => 'record updated successfully',
            'code' => JsonResponse::HTTP_OK,
            'data' => new MunicipalityResource($record),
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
        $record = Municipality::findOrFail($id);

        $record->delete();

        $data = [
            'message' => 'record deleted successfully',
            'code' => JsonResponse::HTTP_NO_CONTENT
        ];

        return response()->json($data, JsonResponse::HTTP_NO_CONTENT);
    }
}
