<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;


class Dns extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'url',
        'status',

    ];
    protected $table = 'dns';
}
