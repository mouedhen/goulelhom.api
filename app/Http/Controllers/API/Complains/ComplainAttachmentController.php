<?php

namespace App\Http\Controllers\API\Complains;

use App\Http\Resources\Complains\ComplainResource;
use App\Models\Complains\Complain;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplainAttachmentController extends Controller
{
    public function store(Request $request, $id)
    {
        $collection = 'attachments';
        $record = Complain::findOrFail($id);
        $record
            ->addMedia($request->file)
            ->toMediaCollection($collection);
        $data = [
            'message' => 'file uploaded successfully',
            'code' => JsonResponse::HTTP_ACCEPTED,
            'data' => new ComplainResource($record),
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
    public function destroy($mediaId, $recordID, Request $request)
    {
        $record = Complain::findOrFail($recordID);
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
