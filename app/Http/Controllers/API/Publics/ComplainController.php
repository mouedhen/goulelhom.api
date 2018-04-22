<?php

namespace App\Http\Controllers\API\Publics;

use App\Http\Resources\Publics\ComplainResource;
use App\Models\Complains\Complain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplainController extends \App\Http\Controllers\API\Complains\ComplainController
{
    public function index()
    {
        return ComplainResource::collection(
            Complain::all()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return ComplainResource
     */
    public function show($id)
    {
        $record = Complain::findOrFail($id);
        return new ComplainResource(
            $record
        );
    }
}
