<?php

namespace App\Http\Controllers;

use App\Application\UseCase\Authentication\AuthenticationServices;
use App\Http\Requests\LogInRequest;
use App\Http\Requests\SignUpRequest;


class AuthController extends Controller {
    private $authenticationServices;

    public function __construct(AuthenticationServices $authenticationServices) {
        $this->authenticationServices = $authenticationServices;
    }

    public function signUpNewUser(SignUpRequest $request) {
        $inputUser = $request->all();
//        $this->authenticationServices->createNewUser($inputUser);
        return $inputUser;
    }

    public function login(LogInRequest $request) {
        $inputUser = $request->all();
        return $inputUser;
    }
}
