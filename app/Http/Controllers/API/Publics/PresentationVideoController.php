<?php

namespace App\Http\Controllers\API\Publics;

use App\Http\Resources\Base\PresentationVideoResource;
use App\Models\Base\PresentationVideo;
use App\Http\Controllers\Controller;

class PresentationVideoController extends Controller
{
    public function __invoke()
    {
        return PresentationVideoResource::collection(PresentationVideo::where('is_selected', '=', true)->get());
    }
}
