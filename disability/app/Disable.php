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

    public function getGender() {
        if($this->gender == 'male') {
            return 'पुरुष';
        } else if ($this->gender = 'female') {
            return 'महिला';
        }
        return 'तेस्रो लिङ्गी';
    }

    public function getDisabilityCategory() {
        if ($this->disability_category == "शारीरिक अपाङ्गता") {
            return 'Physical disability';
        } else if ($this->disability_category == "स्वर बोलाई अपाङगता") {
            return 'Speech Impaired';
        } else if ($this->disability_category == "बहिरा") {
            return 'Hearing Impaired';
        } else if ($this->disability_category == "वौद्धिक अपाङ्ग वा सुस्त मनस्थिति") {
            return 'Mentally retarded';
        } else if ($this->disability_category == "अटिजम") {
            return 'Autism';
        } else if ($this->disability_category == "होमोफेलिया") {
            return 'Homophilia';
        } else if ($this->disability_category == "मनो समाजीक अपाङ्गता") {
            return 'Psychosocial disability';
        } else if ($this->disability_category == "वहु अपाङगता") {
            return 'Multiple disabilities';
        } else if ($this->disability_category == "पूर्ण दृस्टी बिहिन") {
            return 'Completely blind';
        } else if ($this->disability_category == "दृस्टी बिहिन") {
            return 'Blindness';
        } else if ($this->disability_category == "न्युन दृस्टी बिहिन") {
            return 'Low vision';
        }
        return 'Dull hearing';
    }
}
