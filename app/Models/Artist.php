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

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function sponsors() {
        return $this->belongsToMany(Sponsor::class)->withPivot('start_date', 'end_date');
    }

    public function ratings() {
        return $this->belongsToMany(Rating::class)->withPivot('rating_date');
    }

    protected $guarded = ['slug', 'user_id', 'profile_photo'];
}
