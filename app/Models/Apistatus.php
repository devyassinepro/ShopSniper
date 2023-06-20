<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;


class Apistatus extends Model
{

    use HasFactory;

    protected $fillable = [
        'id',
        'store',
        'status',
    ];
    //  protected $table = 'apistatuses';
    protected $connection="mongodb_second";
    protected $collection = 'apistatuses';


}
