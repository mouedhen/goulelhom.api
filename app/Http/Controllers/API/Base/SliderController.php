<?php

namespace App\Http\Controllers\API\Base;

use App\Http\Resources\Base\SliderResource;
use App\Models\Base\Slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\App;

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = new Slider();

        $record->fill([
            App::getLocale() => [
                'author' => $request->get('author'),
                'quote' => $request->get('quote'),
            ]
        ]);

        $record->is_selected = $request->get('is_selected');

        $record->save();

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
     * @param  int $id
     * @return SliderResource
     */
    public function show($id)
    {
        $record = Slider::findOrFail($id);
        return new SliderResource(
            $record
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return SliderResource
     */
    public function update(Request $request, $id)
    {
        $record = Slider::findOrFail($id);

        $record->fill([
            App::getLocale() => [
                'author' => $request->get('author'),
                'quote' => $request->get('quote'),
            ]
        ]);

        $record->is_selected = $request->get('is_selected');

        $record->save();

        $data = [
            'message' => 'record updated successfully',
            'code' => JsonResponse::HTTP_OK,
            'data' => new SliderResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Slider::findOrFail($id);

        $record->delete();

        $data = [
            'message' => 'record deleted successfully',
            'code' => JsonResponse::HTTP_NO_CONTENT
        ];

        return response()->json($data, JsonResponse::HTTP_NO_CONTENT);
    }
}
