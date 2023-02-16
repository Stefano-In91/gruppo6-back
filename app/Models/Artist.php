<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function techniques() {
        return $this->belongsToMany(Technique::class);
    }

    protected $guarded = ['slug', 'user_id', 'profile_photo'];
}
