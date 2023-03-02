<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Apistatus extends Model
{

    use HasFactory;
    protected $fillable = [
        'id',
        'store',
        'status',
    ];
     protected $table = 'apistatuses';



}
