<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeniorCitizenRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'locality' => 'required',
            'dob_nepali' => 'required',
            'dob_english' => 'required|date',
            'age' => 'required|numeric',
            'gender' => 'required|in:male,female,other',
            'blood_group' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'state' => 'required|in:प्रदेश १,प्रदेश २,बागमती प्रदेश,गण्डकी प्रदेश,प्रदेश ५,कर्नाली प्रदेश,सुदुरपस्चिम प्रदेश',
            'district' => 'required',
            'local_level' => 'required',
            'ward_no' => 'required',
            'citizenship_no' => 'required',
            'citizenship_issued_district' => 'required',
            'citizenship_issued_date_nepali' => 'required',
            'citizenship_issued_date_english' => 'required|date',
            'contact_person_name' => 'required',
            'contact_person_address' => 'required',
        ];
    }
}
