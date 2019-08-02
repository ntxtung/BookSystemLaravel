<?php


namespace App\Application\UseCase\Authentication;

use App\Application\Exception\QueryException;

class AuthenticationServices {
    public function createNewUser($user) {
        try {
            $user->save();
        } catch (QueryException $e) {
            // NOT WORKING
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                error_log('Duplicate Entry');
            }
        }
    }

}
