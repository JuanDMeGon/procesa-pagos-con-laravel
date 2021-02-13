<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentPlatform extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'subscriptions_enabled',
    ];
}
