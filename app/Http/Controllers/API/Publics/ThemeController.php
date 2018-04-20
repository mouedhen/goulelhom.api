<?php

namespace App\Http\Controllers\API\Publics;

use App\Http\Resources\Publics\ThemeResource;
use App\Models\Metrics\Theme;
use App\Http\Controllers\Controller;

class ThemeController extends \App\Http\Controllers\API\Metrics\ThemeController
{
    public function index()
    {
        return ThemeResource::collection(
            Theme::all()
        );
    }
}
