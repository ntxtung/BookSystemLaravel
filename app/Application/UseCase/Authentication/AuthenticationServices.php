<?php


namespace App\Application\UseCase\Authentication;

use App\Application\Exception\AppQueryException;
use App\Domain\Entities\Users;

class AuthenticationServices {
    public function createNewUser($inputUser) {
        try {
            // Stupid code
            $user = new Users($inputUser);
            $user->username = $inputUser['username'];
            $user->password = bcrypt($inputUser['password']);
            $user->firstname = $inputUser['firstname'];
            $user->lastname = $inputUser['lastname'];
            $user->email = $inputUser['email'];
            $user->save();
            // END
            return $user;
        } catch (AppQueryException $e) {
            // NOT WORKING
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                error_log('Duplicate Entry');
            }
        }
        return null;
    }

}
