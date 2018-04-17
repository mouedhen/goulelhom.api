<?php

namespace App\Http\Controllers\API\Metrics;

use App\Http\Requests\Metrics\ThemeStoreRequest;
use App\Http\Resources\Metrics\ThemeResource;
use App\Models\Metrics\Theme;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ThemeResource::collection(
            Theme::paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ThemeStoreRequest $request
     * @return JsonResponse
     */
    public function store(ThemeStoreRequest $request)
    {
        $record = new Theme();
        $transParams = $request->only(['name', 'description',]);
        $params = $request->only(['color',]);

        $record->fill([
            App::getLocale() => $transParams,
            $params,
        ]);

        $record->save();

        $data = [
            'message' => 'record created successfully',
            'code' => JsonResponse::HTTP_CREATED,
            'data' => new ThemeResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return ThemeResource
     */
    public function show($id)
    {
        $record = Theme::findOrFail($id);
        return new ThemeResource(
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
        $record = Theme::findOrFail($id);

        $transParams = $request->only(['name', 'description',]);
        $params = $request->only(['color',]);

        $record->fill([
            App::getLocale() => $transParams,
            $params,
        ]);

        $record->save();

        $data = [
            'message' => 'record updated successfully',
            'code' => JsonResponse::HTTP_OK,
            'data' => new ThemeResource($record),
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
        $record = Theme::findOrFail($id);

        $record->delete();

        $data = [
            'message' => 'record deleted successfully',
            'code' => JsonResponse::HTTP_NO_CONTENT
        ];

        return response()->json($data, JsonResponse::HTTP_NO_CONTENT);
    }
}
