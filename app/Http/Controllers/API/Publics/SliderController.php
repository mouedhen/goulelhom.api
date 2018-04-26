<?php

namespace App\Http\Controllers\API\Publics;

use App\Http\Resources\Base\SliderResource;
use App\Models\Base\Slider;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function __invoke()
    {
        return SliderResource::collection(
            Slider::where('is_selected', '=', true)->get()
        );
    }
}
