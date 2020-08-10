<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertifierRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'nep_name' => 'required',
            'eng_name' => 'required|string',
            'post_nepali' => 'required',
            'post_english' => 'required|string'
        ];
    }
}
