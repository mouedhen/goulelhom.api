<?php
/**
 * Created by PhpStorm.
 * User: mouedhen
 * Date: 11/04/18
 * Time: 01:30
 */

namespace App\Http\Controllers\API\Metrics;


use App\Http\Controllers\Controller;
use App\Http\Resources\Metrics\ReportResource;
use App\Models\Metrics\Report;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ReportController extends Controller
{
    public function index()
    {
        return ReportResource::collection(
            Report::pagiante()
        );
    }

    public function store(Request $request)
    {
        $record = new Report();

        $record->fill([
            App::getLocale() => [
                'title' => $request->get('title'),
                'description' => $request->get('description'),
            ]
        ]);

        $record->published_at = $request->get('published_at');
        $record->period_start_at = $request->get('period_start_at');
        $record->period_end_at = $request->get('period_end_at');

        $record->save();

        $data = [
            'message' => 'record created successfully',
            'code' => JsonResponse::HTTP_CREATED,
            'data' => new ReportResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    public function show($id)
    {
        $record = Report::findOrFail($id);
        return new ReportResource(
            $record
        );
    }

    public function update(Request $request, $id)
    {
        $record = Report::findOrFail($id);

        $record->fill([
            App::getLocale() => [
                'title' => $request->get('title'),
                'description' => $request->get('description'),
            ]
        ]);

        $record->published_at = $request->get('published_at');
        $record->period_start_at = $request->get('period_start_at');
        $record->period_end_at = $request->get('period_end_at');

        $record->save();

        $data = [
            'message' => 'record updated successfully',
            'code' => JsonResponse::HTTP_OK,
            'data' => new ReportResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_OK);
    }

    public function destroy($id)
    {
        $record = Report::findOrFail($id);

        $record->delete();

        $data = [
            'message' => 'record deleted successfully',
            'code' => JsonResponse::HTTP_NO_CONTENT
        ];

        return response()->json($data, JsonResponse::HTTP_NO_CONTENT);
    }
}