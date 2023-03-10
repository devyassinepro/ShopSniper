<?php

namespace App\Models;

use App\Models\Niche;
use App\Models\Product;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Jenssegers\Mongodb\Eloquent\Model;


class stores extends Model
{

    // protected $connection = 'mongodb';
    // protected $collection = 'stores';

    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'url',
        'status',
        'revenue',
        'city',
        'country',
        'currency',
        'shopifydomain',
        'sales',
        'allproducts',
        'user_id'
    ];
    public function niches(){
        return $this->belongsToMany(Niche::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
        
    }


    protected $table = 'stores';

    
}
