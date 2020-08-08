<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Disable extends Model
{
    protected $fillable = ['user_id', 'nep_name', 'eng_name', 'state', 'district', 'local_level', 'ward_no', 'dob_nepali', 'dob_english', 'gender', 'age', 'blood_group', 'guardian_nep_name', 'guardian_eng_name', 'citizenship_no', 'citizenship_issued_district', 'citizenship_issued_date_nepali', 'citizenship_issued_date_english', 'disability_category', 'disability_severity', 'image'];

    public function scopeUserId($query) {
        return $query->where('user_id', Auth::id());
    }

    // belongs to relation with user
    public function user() {
        return $this->belongsTo(User::class);
    }
}
