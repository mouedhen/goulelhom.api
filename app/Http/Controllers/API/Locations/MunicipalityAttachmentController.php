<?php

namespace App\Http\Controllers\API\Locations;

use App\Http\Resources\Locations\MunicipalityResource;
use App\Models\Locations\Municipality;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MunicipalityAttachmentController extends Controller
{
    public function store(Request $request, $id)
    {
        $collection = 'attachments';
        if ($request->query('collection')) {
            switch ($request->query) {
                case 'cover':
                    $collection = 'cover';
                    break;
                case 'miniatures':
                    $collection = 'cover';
                    break;
            }
        }
        $record = Municipality::findOrFail($id);
        $record
            ->addMedia($request->file)
            ->toMediaCollection($collection);
        $data = [
            'message' => 'file uploaded successfully',
            'code' => JsonResponse::HTTP_ACCEPTED,
            'data' => new MunicipalityResource($record),
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
        $record = Municipality::findOrFail($recordID);
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
