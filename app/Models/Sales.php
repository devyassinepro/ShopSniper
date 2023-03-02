<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'products_id',
    ];



    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
        
    }



     protected $table = 'sales';
}
