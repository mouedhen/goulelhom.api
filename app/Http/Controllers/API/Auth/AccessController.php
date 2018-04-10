<?php

namespace App\Http\Controllers\API\Auth;

use App\Events\UserConnectionEvent;
use App\Http\Requests\Auth\LoginAttemptRequest;
use App\Http\Resources\Auth\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AccessController extends Controller
{
    public function guard()
    {
        return Auth::guard('api');
    }

    public function login(LoginAttemptRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ])) {
            $user = Auth::user();
            $roles = $user->roles->toArray();
            $scope = [];
            foreach ($roles as $role) {
                array_push($scope, $role['name']);
            }
            $user['token'] = $user->createToken('goulelhom-app', $scope)->accessToken;

            $event = new UserConnectionEvent(['name' => $user['name'], 'email' => $user['email']]);
            broadcast($event)->toOthers();

            return response()->json(['data' => $user], JsonResponse::HTTP_OK);
        }

        $data = [
            'code' => JsonResponse::HTTP_UNAUTHORIZED,
            'error' => 'UNAUTHORIZED',
            'message' => 'Please check your credential...'
        ];

        return response()->json(['data' => $data], JsonResponse::HTTP_UNAUTHORIZED);
    }

    public function logout(Request $request)
    {
        if (!$this->guard()->check()) {
            $data = [
                'code' => JsonResponse::HTTP_UNAUTHORIZED,
                'error' => 'UNAUTHORIZED',
                'message' => 'No active user session was found'
            ];
            return response()->json(['data' => $data], JsonResponse::HTTP_UNAUTHORIZED);
        }

        $request->user('api')->token()->revoke();

        if (config('core.auth.unique_session')) {
            DB::table('oauth_access_tokens')
                ->where('user_id', '=', $request->user('api')->id)
                ->update(array('revoked' => true));
        }

        // $this->guard('web')->logout();

        Session::flush();
        Session::regenerate();

        return response()->json(['data' => ['message' => 'User was logged out.']]);
    }

    public function profile(Request $request)
    {
        return new UserResource($request->user('api'));
    }

    public function loginIndex()
    {
        $data = [
            'code' => JsonResponse::HTTP_NOT_IMPLEMENTED,
            'error' => 'NOT IMPLEMENTED',
        ];
        return response()->json(['data' => $data], JsonResponse::HTTP_NOT_IMPLEMENTED);
    }

    public function logoutIndex()
    {
        $data = [
            'code' => JsonResponse::HTTP_NOT_IMPLEMENTED,
            'error' => 'NOT IMPLEMENTED',
        ];
        return response()->json(['data' => $data], JsonResponse::HTTP_NOT_IMPLEMENTED);
    }
}
