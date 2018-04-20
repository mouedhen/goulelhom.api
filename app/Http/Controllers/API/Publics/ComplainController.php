<?php

namespace App\Http\Controllers\API\Publics;

use App\Http\Resources\Publics\ComplainResource;
use App\Models\Complains\Complain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplainController extends Controller
{
    public function index()
    {
        return ComplainResource::collection(
            Complain::all()
        );
    }
}
