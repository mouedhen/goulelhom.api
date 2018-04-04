<?php

namespace App\Http\Controllers\API\Base;

use App\Http\Requests\Base\PresentationVideoStoreRequest;
use App\Http\Resources\Base\PresentationVideoResource;
use App\Models\Base\PresentationVideo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PresentationVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PresentationVideoResource::collection(
            PresentationVideo::paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PresentationVideoStoreRequest $request
     * @return PresentationVideo
     */
    public function store(PresentationVideoStoreRequest $request)
    {
        if ($request->get('is_selected') === true) {
            PresentationVideo::where('is_selected', '=', true)->update(['is_selected' => false]);
        }

        $params = $request->only(['name', 'url', 'is_selected']);

        return new PresentationVideo(
            PresentationVideo::create($params)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return PresentationVideoResource
     */
    public function show($id)
    {
        return new PresentationVideoResource(
            PresentationVideo::findOrFail($id)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return PresentationVideoResource
     */
    public function update(Request $request, $id)
    {
        if ($request->get('is_selected') === true) {
            PresentationVideo::where('is_selected', '=', true)->update(['is_selected' => false]);
        }

        $params = $request->only(['name', 'url', 'is_selected']);
        $record = PresentationVideo::findOrFail($id);
        $record->update($params);
        return new PresentationVideoResource($record);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PresentationVideo::findOrFail($id)
            ->delete();

        $data = [
            'message' => 'record deleted successfully',
            'code' => JsonResponse::HTTP_NO_CONTENT
        ];

        return response()->json($data, JsonResponse::HTTP_NO_CONTENT);
    }
}
