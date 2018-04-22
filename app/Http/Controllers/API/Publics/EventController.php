<?php

namespace App\Http\Controllers\API\Publics;

use App\Http\Resources\Publics\EventResource;
use App\Models\Posts\Event;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        return EventResource::collection(
            Event::orderBy('start_date', 'desc')->get()
        );
    }

    public function show($id)
    {
        $record = Event::findOrFail($id);
        return new EventResource(
            $record
        );
    }
}
