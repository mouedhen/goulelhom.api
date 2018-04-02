<?php

namespace App\Http\Controllers\API\Users;

use App\Http\Resources\Auth\RoleResource;
use App\Models\Auth\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return RoleResource::collection(
            Role::paginate()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return RoleResource
     */
    public function show($id)
    {
        return new RoleResource(Role::findOrFail($id));
    }
}
