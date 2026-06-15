<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];

    protected $casts = [
        'what_is_included' => 'array',
        'itinerary' => 'array',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
