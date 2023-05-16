<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validatpion rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'phone' => 'required|unique:users',
            'password' => 'required|min:8|max:20|confirmed',
            'password_confirmation' => 'required|same:password',
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'name.required' => 'validation.name',
    //         'email.required' => 'validation.email',
    //         'password.required' => 'validation.password',
    //         'password.min' => 'validation.mixed',
    //         'password_confirmation.required' => 'validation.password_confirmation'
    //     ];
    // }
}
