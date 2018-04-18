<?php

namespace App\Http\Controllers\API\Posts;

use App\Http\Requests\API\Posts\PressStoreRequest;
use App\Http\Resources\API\Posts\PressResource;
use App\Models\Posts\Press;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class PressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PressResource::collection(
            Press::paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PressStoreRequest $request
     * @return JsonResponse
     */
    public function store(PressStoreRequest $request)
    {
        $record = new Press();
        $transParams = $request->only(['name', 'description',]);
        $params = $request->only(['url',]);

        $record->fill([
            App::getLocale() => $transParams,
            $params,
        ]);

        $record->save();

        $data = [
            'message' => 'record created successfully',
            'code' => JsonResponse::HTTP_CREATED,
            'data' => new PressResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return PressResource
     */
    public function show($id)
    {
        $record = Press::findOrFail($id);
        return new PressResource(
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
        $record = Press::findOrFail($id);

        $transParams = $request->only(['name', 'description',]);
        $params = $request->only(['url',]);

        $record->fill([
            App::getLocale() => $transParams,
            $params,
        ]);

        $record->save();

        $data = [
            'message' => 'record updated successfully',
            'code' => JsonResponse::HTTP_OK,
            'data' => new PressResource($record),
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
        $record = Press::findOrFail($id);

        $record->delete();

        $data = [
            'message' => 'record deleted successfully',
            'code' => JsonResponse::HTTP_NO_CONTENT
        ];

        return response()->json($data, JsonResponse::HTTP_NO_CONTENT);
    }
}
