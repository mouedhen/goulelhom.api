<?php

namespace App\Http\Controllers\API\Publics;

use App\Http\Resources\Publics\PetitionResource;
use App\Models\Petitions\Petition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetitionController extends Controller
{
    public function index()
    {
        return PetitionResource::collection(
            Petition::all()
        );
    }
}
