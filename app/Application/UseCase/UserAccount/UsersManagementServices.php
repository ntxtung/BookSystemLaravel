<?php


namespace App\Application\UseCase\UserAccount;

use App\Application\Helper\UserHelper;
use App\Domain\Entities\Users;

class UsersManagementServices {
    private $userHelper;

    public function __construct(UserHelper $userHelper) {
        $this->userHelper = $userHelper;
    }

    public function getListOfUsers() {
        return Users::all();
    }

    public function getUserById($requestId, $userId) {
        $responseUser = null;
        if ($requestId == $userId) {
            $responseUser = $this->userHelper->getFullUserById($userId);
        } else {
            $responseUser = $this->userHelper->getBasicUserById($userId);
        }
        if ($responseUser != null) {
            return $responseUser;
        } else {
//            throw new Ex
            return null;
        }
    }

    public function updateUserInformation() {

    }

    public function deleteUser() {

    }
}
