<?php

namespace App\Models;
use App\Models\Sales;
use App\Models\stores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;


class Product extends Model
{

    // protected $connection = 'mongodb';
    // protected $collection = 'products';

    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'timesparam',
        'prix',
        'revenue',
        'stores_id',
        'url',
        'imageproduct',
        'totalsales',
        'favoris',
        'starttracking',
        'todaysales',
        'yesterdaysales',
        'day3sales',
        'day4sales',
        'day5sales',
        'day6sales',
        'day7sales',
        'weeksales',
        'monthsales',
        'created_at_shopify',
        'created_at_favorite',
        'price_aliexpress',
        'image2',
        'image3',
        'image4',
        'image5',
        'image6',
        'dropshipping',
        'tshirt',
        'digital',

    ];
    
    public function stores()
    {
        // return $this->hasMany(stores::class);
        return $this->belongsTo(stores::class, 'stores_id'); // Assuming 'stores_id' is the foreign key.

        
    }
    
    public function sales(): HasMany
    {
        return $this->hasMany(Sales::class);
        
    }

    public function todaysales()
    {
        return $this->hasMany(Sales::class)->where('created_at', '=', Carbon::now()->format('Y-m-d'));
    }

    public function yesterdaysales()
    {
        return $this->hasMany(Sales::class)->where('created_at', '=', Carbon::now()->subDays(1)->format('Y-m-d'));
    }

    public function day3sales()
    {
        return $this->hasMany(Sales::class)->where('created_at', '=', Carbon::now()->subDays(2)->format('Y-m-d'));
    }

    public function day4sales()
    {
        return $this->hasMany(Sales::class)->where('created_at', '=', Carbon::now()->subDays(3)->format('Y-m-d'));
    }

    public function day5sales()
    {
        return $this->hasMany(Sales::class)->where('created_at', '=', Carbon::now()->subDays(4)->format('Y-m-d'));
    }


    public function day6sales()
    {
        return $this->hasMany(Sales::class)->where('created_at', '=', Carbon::now()->subDays(5)->format('Y-m-d'));
    }
    public function day7sales()
    {
        return $this->hasMany(Sales::class)->where('created_at', '=', Carbon::now()->subDays(6)->format('Y-m-d'));
    }
    public function weeklysales()
    {
        $now= Carbon::now()->format('Y-m-d');
        $Week= Carbon::now()->subDays(7)->format('Y-m-d');

        return $this->hasMany(Sales::class)
        ->whereBetween('created_at', [$now, $Week]);
    }

    public function montlysales()
    {
        $now= Carbon::now()->format('Y-m-d');
        $montly= Carbon::now()->subDays(30)->format('Y-m-d');

        return $this->hasMany(Sales::class)
        ->whereBetween('created_at', [$now, $montly]);    }

     protected $table = 'products';
}
