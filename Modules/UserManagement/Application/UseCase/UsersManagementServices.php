<?php


namespace Modules\UserManagement\Application\UseCase;

use Modules\UserManagement\Application\Helper\UserHelper;

class UsersManagementServices {
    private $_userHelper;

    public function __construct(UserHelper $userHelper) {
        $this->_userHelper = $userHelper;
    }

    public function getListOfUsers() {
        return $this->_userHelper->getListOfUsers();
    }

    public function getUserById($requestId, $userId) {
        $responseUser = null;
        if ($requestId == $userId) {
            $responseUser = $this->_userHelper->getFullUserById($userId);
        } else {
            $responseUser = $this->_userHelper->getBasicUserById($userId);
        }
        if ($responseUser != null) {
            return $responseUser;
        } else {
            return null;
        }
    }

    public function updateUserInformation() {

    }

    public function deleteUser() {

    }
}
