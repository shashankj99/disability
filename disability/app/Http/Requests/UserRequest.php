<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'phone' => ["required", "numeric"],
            'address' => ["required", "string"],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ["required"],
        ];
    }
}
