<?php

namespace App\Http\Controllers\API\Publics;

use App\Http\Resources\Publics\PetitionResource;
use App\Models\Petitions\Petition;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetitionAttachmentController extends Controller
{
    public function store(Request $request, $id)
    {
        $collection = 'attachments';
        $record = Petition::findOrFail($id);
        $record
            ->addMedia($request->file('file'))
            ->toMediaCollection($collection);
        $data = [
            'message' => 'file uploaded successfully',
            'code' => JsonResponse::HTTP_ACCEPTED,
            'data' => new PetitionResource($record),
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }
}
