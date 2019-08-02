<?php


namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class SignUpRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'firstname' => ['string', 'nullable'],
            'lastname' => ['string', 'nullable'],
            'username' => ['string', 'required', 'unique:Users'],
            'avatar' => ['image', 'nullable'],
            'role' => ['integer', 'nullable'],
            'email' => 'required|string|email|unique:Users',
            'password' => 'required|string|min:6'
        ];
    }

    protected function failedValidation(Validator $validator) {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(
            [
                'error' => $errors,
                'status_code' => 422,
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
