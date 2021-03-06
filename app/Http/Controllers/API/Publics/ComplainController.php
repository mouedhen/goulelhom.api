<?php

namespace App\Http\Controllers\API\Publics;

use App\Http\Resources\Publics\ComplainResource;
use App\Models\Complains\Complain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplainController extends \App\Http\Controllers\API\Complains\ComplainController
{
    public function index(Request $request)
    {
        return ComplainResource::collection(
            Complain::orderBy('created_at', 'desc')->get()
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
