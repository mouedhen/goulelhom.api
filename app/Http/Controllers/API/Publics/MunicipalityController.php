<?php

namespace App\Http\Controllers\API\Publics;

use App\Http\Resources\Publics\MunicipalityDetailsResource;
use App\Http\Resources\Publics\MunicipalityResource;
use App\Models\Locations\Municipality;
use App\Http\Controllers\Controller;

class MunicipalityController extends Controller
{
    public function index()
    {
        return MunicipalityResource::collection(
            Municipality::all()
        );
    }

    public function show($id)
    {
        $record = Municipality::findOrFail($id);
        return new MunicipalityDetailsResource(
            $record
        );
    }
}
