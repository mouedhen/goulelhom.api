<?php
/**
 * Created by PhpStorm.
 * User: mouedhen
 * Date: 05/04/18
 * Time: 22:58
 */

namespace App\Http\Controllers\API\Base;


use App\Http\Controllers\Controller;
use App\Http\Resources\Base\SliderResource;
use App\Models\Base\Slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SliderImgController extends Controller
{
    public function store(Request $request, $id)
    {
        $record = Slider::findOrFail($id);
        $record
            ->addMedia($request->file)
            ->toMediaCollection('sliders');
        $data = [
            'message' => 'file uploaded successfully',
            'code' => JsonResponse::HTTP_ACCEPTED,
            'data' => new SliderResource($record),
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $mediaId
     * @param int $slideID
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($mediaId, $slideID, Request $request)
    {
        $record = Slider::findOrFail($slideID);
        $record
            ->getMedia()
            ->keyBy('id')
            ->get($mediaId)
            ->delete();

        $data = [
            'message' => 'file deleted successfully',
            'code' => JsonResponse::HTTP_NO_CONTENT
        ];
        return response()->json($data, JsonResponse::HTTP_NO_CONTENT);
    }
}
