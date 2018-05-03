<?php
/**
 * Created by PhpStorm.
 * User: mouedhen
 * Date: 26/03/18
 * Time: 00:49
 */

namespace App\Http\Controllers\API\Users;


use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserAvatarController extends Controller
{
    /**
     * @var User
     */
    protected $user;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded
     */
    public function store(Request $request)
    {
        // TODO add validation
        $this->user
            ->addMedia($request->file)
            ->toMediaCollection('avatar');
        $data = [
            'message' => 'file uploaded successfully',
            'code' => JsonResponse::HTTP_ACCEPTED
        ];
        return response()->json($data, JsonResponse::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $mediaId
     * @return \Illuminate\Http\Response
     * @throws \Spatie\MediaLibrary\Exceptions\MediaCannotBeDeleted
     */
    public function destroy($mediaId)
    {
        $this->user->deleteMedia($mediaId);

        $data = [
            'message' => 'file deleted successfully',
            'code' => JsonResponse::HTTP_NO_CONTENT
        ];
        return response()->json($data, JsonResponse::HTTP_NO_CONTENT);
    }
}
