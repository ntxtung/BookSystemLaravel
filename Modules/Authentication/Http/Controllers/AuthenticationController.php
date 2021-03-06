<?php

namespace Modules\Authentication\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Authentication\Application\UseCase\AuthenticationServices;
use Modules\BookSystem\Http\Requests\LogInRequest;
use Modules\BookSystem\Http\Requests\SignUpRequest;

class AuthenticationController extends Controller
{
    private $authenticationServices;

    public function __construct(AuthenticationServices $authenticationServices) {
        $this->authenticationServices = $authenticationServices;
    }

    public function register(SignUpRequest $request) {
        $inputUser = $request->all();
        $response = $this->authenticationServices->createNewUser($inputUser);
        $fullResponse = (object) array_merge((array)$inputUser, array('token' => auth()->attempt(request(['username', 'password']))));
        $fullResponse->password = null;
        return response()->json($fullResponse, Response::HTTP_CREATED);
    }

    public function login(LogInRequest $request) {
        $credentials = request(['username', 'password']);
        if (!($token = auth()->attempt($credentials))) {
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
//        return response()->json(['token' => $token], Response::HTTP_OK);
        return $this->respondWithToken($token);
    }

//
//    public function me() {
//        return response()->json(auth()->user(), Response::HTTP_OK);
//    }

    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out'], Response::HTTP_OK);
    }

    public function refresh() {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ], Response::HTTP_OK);
    }
}
