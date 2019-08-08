<?php


namespace App\Application\Helper;

use App\Application\Dtos\BasicUserDtos;
use App\Application\Dtos\FullUserDtos;
use App\Domain\Entities\Users;

class UserHelper {
    public function __construct() {
    }

    public function findUserById($userId) {
        return Users::find($userId);
    }

    public function getListOfUsers() {
        return Users::all();
    }

    public function getBasicUserById($userId) {
        $targetUser = new BasicUserDtos();
        $targetUser->parseUser($this->findUserById($userId));
        return $targetUser;
    }

    public function getFullUserById($userId) {
        $targetUser = new FullUserDtos();
        $targetUser->parseUser($this->findUserById($userId));
        return $targetUser;
    }
}
