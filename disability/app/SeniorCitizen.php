<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SeniorCitizen extends Model
{
    protected $fillable = ['user_id', 'name' , 'locality', 'state', 'district', 'local_level', 'ward_no', 'dob_nepali', 'dob_english', 'gender', 'age', 'blood_group', 'citizenship_no', 'citizenship_issued_district', 'citizenship_issued_date_nepali', 'citizenship_issued_date_english', 'spouse_name', 'facilities', 'contact_person_name', 'contact_person_address', 'certificate_no', 'home_care_name', 'disease', 'medicine', 'image'];

    public function scopeUserId($query) {
        return $query->where('user_id', Auth::id());
    }

    /**
     * Get the user who's responsible for this model maintenance
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getGender() {
        if($this->gender == 'male') {
            return 'पुरुष';
        } else if ($this->gender = 'female') {
            return 'महिला';
        }
        return 'तेस्रो लिङ्गी';
    }
}
