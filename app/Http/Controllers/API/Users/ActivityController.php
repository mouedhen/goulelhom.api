<?php

namespace App\Http\Controllers\API\Users;

use App\Http\Resources\Auth\ActivityResource;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ActivityResource::collection(
            Activity::orderBy('updated_at', 'desc')->paginate()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return ActivityResource
     */
    public function show($id)
    {
        return new ActivityResource(Activity::findOrFail($id));
    }
}
