<?php


namespace Modules\BookSystem\Application\Dtos;


use Modules\BookSystem\Domain\Entities\Users;

class BasicUserDtos {
    public function parseUser(Users $user) {
        $this->id = $user->id;
        $this->username = $user->username;
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->avatar = $user->avatar;
    }
}
