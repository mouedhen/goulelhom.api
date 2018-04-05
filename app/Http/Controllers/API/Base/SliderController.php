<?php

namespace App\Http\Controllers\API\Base;

use App\Http\Resources\Base\SliderResource;
use App\Models\Base\Slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return SliderResource::collection(
            Slider::paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = Slider::create([
            'author' => $request->get('author'),
            'quote' => $request->get('quote'),
            'is_selected' => $request->get('is_selected'),
        ]);

        $data = [
            'message' => 'record created successfully',
            'code' => JsonResponse::HTTP_CREATED,
            'data' => new SliderResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
