<?php

namespace Modules\BookSystem\Http\Controllers;

use Modules\BookSystem\Application\UseCase\UserAccount\UsersManagementServices;
use Modules\BookSystem\Domain\Entities\Users;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;


class UsersController extends Controller {
    private $usersManagementServices;

    public function __construct(UsersManagementServices $usersManagementServices) {
        $this->usersManagementServices = $usersManagementServices;
    }

    public function getUsersList() {
        return Users::all();
    }

    public function getUserById($userId) {
        $currentUser = auth()->user();
        $servicesResponse = $this->usersManagementServices->getUserById($currentUser->id, $userId);

        return response()->json($servicesResponse, Response::HTTP_OK);
    }
}
