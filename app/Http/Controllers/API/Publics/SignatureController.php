<?php

namespace App\Http\Controllers\API\Publics;

use App\Models\Petitions\Signature;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignatureController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->only(['contact_id', 'petition_id']);
        Signature::firstOrCreate($params);

        $data = [
            'message' => 'record created successfully',
            'code' => JsonResponse::HTTP_CREATED,
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }
}
