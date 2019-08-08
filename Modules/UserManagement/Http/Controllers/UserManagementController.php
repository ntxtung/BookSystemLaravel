<?php

namespace Modules\UserManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\UserManagement\Application\UseCase\UsersManagementServices;

class UserManagementController extends Controller
{
    private $usersManagementServices;

    public function __construct(UsersManagementServices $usersManagementServices) {
        $this->usersManagementServices = $usersManagementServices;
    }

    public function getUsersList() {
        return $this->usersManagementServices->getListOfUsers();
    }

    public function getUserById($userId) {
        $currentUser = auth()->user();
        $servicesResponse = $this->usersManagementServices->getUserById($currentUser->id, $userId);

        return response()->json($servicesResponse, Response::HTTP_OK);
    }
}
