<?php

namespace App\Http\Controllers\API\Posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Posts\EventResource;
use App\Models\Posts\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventMediaController extends Controller
{
    public function store(Request $request, $id)
    {
        // @TODO Generate the thumb on upload
        $record = Event::findOrFail($id);

        $record
            ->addMedia($request->file)
            ->toMediaCollection('events');

        $data = [
            'message' => 'file uploaded successfully',
            'code' => JsonResponse::HTTP_ACCEPTED,
            'data' => new EventResource($record),
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $mediaId
     * @param int $eventID
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($mediaId, $eventID, Request $request)
    {
        $record = Event::findOrFail($eventID);
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