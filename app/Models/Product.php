<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable=[
        'name',
        'price',
        'description',
        'image',
        'status',
        'user_id',
        'product_color',
    ];

public function users()
    {
        return $this->belongsToMany(User::class,'user_products');
    }

}
