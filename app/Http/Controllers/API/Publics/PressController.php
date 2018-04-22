<?php

namespace App\Http\Controllers\API\Publics;

use App\Http\Resources\Publics\PressResource;
use App\Models\Posts\Press;
use App\Http\Controllers\Controller;

class PressController extends Controller
{
    public function index()
    {
        return PressResource::collection(
            Press::all()
        );
    }

    public function show($id)
    {
        $record = Press::findOrFail($id);
        return new PressResource(
            $record
        );
    }
}
