<?php

namespace App\Http\Controllers\API\Metrics;

use App\Http\Requests\Metrics\KeywordStoreRequest;
use App\Http\Resources\Metrics\KeywordResource;
use App\Models\Metrics\Keyword;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeywordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return KeywordResource::collection(
            Keyword::paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param KeywordStoreRequest $request
     * @return JsonResponse
     */
    public function store(KeywordStoreRequest $request)
    {
        $record = new Keyword();
        $params = $request->only(['label',]);

        $record->fill([
            $params,
        ]);

        $record->save();

        $data = [
            'message' => 'record created successfully',
            'code' => JsonResponse::HTTP_CREATED,
            'data' => new KeywordResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return KeywordResource
     */
    public function show($id)
    {
        $record = Keyword::findOrFail($id);
        return new KeywordResource(
            $record
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = Keyword::findOrFail($id);

        $params = $request->only(['label',]);

        $record->fill([
            $params,
        ]);

        $record->save();

        $data = [
            'message' => 'record updated successfully',
            'code' => JsonResponse::HTTP_OK,
            'data' => new KeywordResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Keyword::findOrFail($id);

        $record->delete();

        $data = [
            'message' => 'record deleted successfully',
            'code' => JsonResponse::HTTP_NO_CONTENT
        ];

        return response()->json($data, JsonResponse::HTTP_NO_CONTENT);
    }
}
