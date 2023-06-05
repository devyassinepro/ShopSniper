<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;


class Plan extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'stripe_id',
        'price',
        'active',
        'teams_limit',
        'trial_period_days',
        'interval',
        'store_access_count'
    ];
}
