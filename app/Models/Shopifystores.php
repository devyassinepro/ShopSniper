<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopifystores extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'store_id',
        'email',
        'name',
        'phone',
        'address1',
        'address2',
        'zip',
        'api_key',
        'api_secret_key',
        'myshopify_domain',
        'access_token',
        'user_id',
        'status',
    ];
   
    protected $table = 'shopifystores';
}
