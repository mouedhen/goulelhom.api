<?php

namespace App\Http\Controllers\API\Contacts;

use App\Http\Requests\Contacts\ContactStoreRequest;
use App\Http\Resources\Contacts\ContactResource;
use App\Http\Resources\Contacts\ContactSecureResource;
use App\Models\Contacts\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        if ($request->query('secure')) {
            return ContactSecureResource::collection(
                Contact::paginate()
            );
        }
        return ContactResource::collection(
            Contact::paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactStoreRequest $request
     * @return JsonResponse
     */
    public function store(ContactStoreRequest $request)
    {
        $record = new Contact();
        $params = $request->only(['name', 'email', 'phone_number', 'address']);
        $record->fill($params);

        $record->save();

        $data = [
            'message' => 'record created successfully',
            'code' => JsonResponse::HTTP_CREATED,
            'data' => new ContactResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param Request $request
     * @return ContactResource|ContactSecureResource
     */
    public function show($id, Request $request)
    {
        $record = Contact::findOrFail($id);

        if ($request->query('secure')) {
            return new ContactSecureResource(
                $record
            );
        }

        return new ContactResource(
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
        $record = Contact::findOrFail($id);
        $params = $request->only(['name', 'email', 'phone_number', 'address']);
        $record->fill($params);

        $record->save();

        $data = [
            'message' => 'record updated successfully',
            'code' => JsonResponse::HTTP_OK,
            'data' => new ContactResource($record),
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
        $record = Contact::findOrFail($id);

        $record->delete();

        $data = [
            'message' => 'record deleted successfully',
            'code' => JsonResponse::HTTP_NO_CONTENT
        ];

        return response()->json($data, JsonResponse::HTTP_NO_CONTENT);
    }
}
