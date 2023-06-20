<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Jenssegers\Mongodb\Eloquent\Model;


class Sales extends Model
{
    use HasFactory;
    // protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'products_id',
        'stores_id',
        'prix'
    ];



    // public function products(): HasMany
    // {
    //     return $this->hasMany(Product::class);

    // }
    public function product()
    {
        return $this->hasMany(Product::class, 'products_id', 'id');
    }

    public function stores(): HasMany
    {
        return $this->hasMany(stores::class);

    }

     protected $table = 'sales';
     protected $connection="mongodb_second";
}
