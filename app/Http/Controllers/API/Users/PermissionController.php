<?php

namespace App\Http\Controllers\API\Users;

use App\Http\Resources\Auth\PermissionResource;
use App\Models\Auth\Permission;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PermissionResource::collection(
            Permission::paginate()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return PermissionResource
     */
    public function show($id)
    {
        return new PermissionResource(Permission::findOrFail($id));
    }
}
