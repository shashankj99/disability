<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Certifier extends Model
{
    protected $fillable = ['user_id', 'nep_name', 'eng_name', 'post_nepali', 'post_english'];

    /**
     * Access the user who created this certifier
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeUserId($query) {
        return $query->where('user_id', Auth::id());
    }
}
