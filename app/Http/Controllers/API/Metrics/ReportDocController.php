<?php
/**
 * Created by PhpStorm.
 * User: mouedhen
 * Date: 11/04/18
 * Time: 04:00
 */

namespace App\Http\Controllers\API\Metrics;


use App\Http\Controllers\Controller;
use App\Http\Resources\Metrics\ReportResource;
use App\Models\Metrics\Report;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Spatie\MediaLibrary\FileManipulator;
use Spatie\MediaLibrary\Models\Media;

class ReportDocController extends Controller
{

    public function store(Request $request, $id)
    {
        // @TODO Generate the thumb on upload
        $record = Report::findOrFail($id);

        $record
            ->addMedia($request->file)
            ->toMediaCollection('documents');

        $data = [
            'message' => 'file uploaded successfully',
            'code' => JsonResponse::HTTP_ACCEPTED,
            'data' => new ReportResource($record),
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $mediaId
     * @param int $reportID
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($reportID, $mediaId, Request $request)
    {
        $record = Report::findOrFail($reportID);
        $record->deleteMedia($mediaId);

        $data = [
            'message' => 'file deleted successfully',
            'code' => JsonResponse::HTTP_NO_CONTENT
        ];
        return response()->json($data, JsonResponse::HTTP_NO_CONTENT);
    }
}