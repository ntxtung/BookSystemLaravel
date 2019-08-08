<?php


namespace Modules\BookSystem\Application\Dtos;


use App\Domain\Entities\Users;

class FullUserDtos {
    public function parseUser(Users $user) {
        $this->id = $user->id;
        $this->username = $user->username;
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->avatar = $user->avatar;
        $this->email = $user->email;
        $this->token = null;
    }
}
