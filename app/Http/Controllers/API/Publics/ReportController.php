<?php

namespace App\Http\Controllers\API\Publics;

use App\Http\Resources\Publics\ReportResource;
use App\Models\Metrics\Report;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        return ReportResource::collection(
            Report::orderBy('published_at', 'desc')->paginate()
        );
    }

    public function show($id)
    {
        $record = Report::findOrFail($id);
        return new ReportResource(
            $record
        );
    }
}
