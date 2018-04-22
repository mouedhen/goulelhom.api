<?php

namespace App\Http\Controllers\API\Publics;

use App\Http\Resources\Publics\MunicipalityResource;
use App\Models\Locations\Municipality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MunicipalityController extends \App\Http\Controllers\API\Locations\MunicipalityController
{
    public function index()
    {
        return MunicipalityResource::collection(
            Municipality::all()
        );
    }
}
