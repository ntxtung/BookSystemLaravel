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
        if ($requestId == $userId) {
            return $this->userHelper->getFullUserById($userId);
        } else {
            return $this->userHelper->getBasicUserById($userId);
        }
    }

    public function updateUserInformation() {

    }

    public function deleteUser() {

    }
}
