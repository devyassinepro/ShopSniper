<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;


class Nicheuser extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'niche_id'
    ];


    protected $table = 'niche_users';
    public $timestamps = false;
    protected $connection="mongodb_second";
}
