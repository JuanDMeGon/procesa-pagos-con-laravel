<?php

namespace App;

use App\Subscription;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'slug',
        'price',
        'duration_in_days',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function getVisualPriceAttribute()
    {
        return '$' . number_format($this->price / 100, 2, '.', ',');
    }
}
