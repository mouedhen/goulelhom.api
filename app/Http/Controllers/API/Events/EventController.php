<?php

namespace App\Http\Controllers\API\Events;

use App\Http\Controllers\Controller;
use App\Http\Resources\Posts\EventResource;
use App\Models\Posts\Event;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class EventController extends Controller
{
    public function index()
    {
        return EventResource::collection(
            Event::orderBy('start_date', 'desc')->paginate()
        );
    }

    public function store(Request $request)
    {
        $record = new Event();

        $record->fill([
            App::getLocale() => [
                'title' => $request->get('title'),
                'description' => $request->get('description'),
            ]
        ]);

        if ($request->get('longitude')) $record->longitude = new Carbon($request->get('longitude'));
        if ($request->get('latitude')) $record->latitude = new Carbon($request->get('latitude'));
        if ($request->get('start_date')) $record->start_date = new Carbon($request->get('start_date'));
        if ($request->get('end_date')) $record->end_date = new Carbon($request->get('end_date'));

        $record->save();

        $data = [
            'message' => 'record created successfully',
            'code' => JsonResponse::HTTP_CREATED,
            'data' => new EventResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    public function show($id)
    {
        $record = Event::findOrFail($id);
        return new EventResource(
            $record
        );
    }

    public function update(Request $request, $id)
    {
        $record = Event::findOrFail($id);

        $record->fill([
            App::getLocale() => [
                'title' => $request->get('title'),
                'description' => $request->get('description'),
            ]
        ]);

        if ($request->get('longitude')) $record->longitude = $request->get('longitude');
        if ($request->get('latitude')) $record->latitude = $request->get('latitude');
        if ($request->get('start_date')) $record->start_date = $request->get('start_date');
        if ($request->get('end_date')) $record->end_date = $request->get('end_date');

        $record->save();

        $data = [
            'message' => 'record updated successfully',
            'code' => JsonResponse::HTTP_OK,
            'data' => new EventResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_OK);
    }

    public function destroy($id)
    {
        $record = Event::findOrFail($id);

        $record->delete();

        $data = [
            'message' => 'record deleted successfully',
            'code' => JsonResponse::HTTP_NO_CONTENT
        ];

        return response()->json($data, JsonResponse::HTTP_NO_CONTENT);
    }
}