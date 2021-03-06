<?php

namespace App\Http\Controllers\API\Metrics;

use App\Http\Resources\Metrics\ThemeResource;
use App\Models\Metrics\Theme;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThemeAttachmentController extends Controller
{
    public function store(Request $request, $id)
    {
        $collection = 'attachments';
        if ($request->query('collection')) {
            switch ($request->query('collection')) {
                case 'covers':
                    $collection = 'covers';
                    break;
                case 'miniatures':
                    $collection = 'miniatures';
                    break;
            }

        }
        $record = Theme::findOrFail($id);
        $record
            ->addMedia($request->file)
            ->toMediaCollection($collection);
        $data = [
            'message' => 'file uploaded successfully',
            'code' => JsonResponse::HTTP_ACCEPTED,
            'data' => new ThemeResource($record),
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $mediaId
     * @param int $recordID
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($recordID, $mediaId, Request $request)
    {
        $record = Theme::findOrFail($recordID);
        $record->deleteMedia($mediaId);

        $data = [
            'message' => 'file deleted successfully',
            'code' => JsonResponse::HTTP_NO_CONTENT
        ];
        return response()->json($data, JsonResponse::HTTP_NO_CONTENT);
    }
}
