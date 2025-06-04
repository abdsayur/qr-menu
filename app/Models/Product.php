<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function garnishes()
    {

        return $this->hasMany(Garnish::class);
    }

    public function orders()
    {

        return $this->belongsToMany(Order::class)->whereNull('day');
    }





    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {

            $business_id = Category::where('id', $product->category_id)->first();

            $product->business_id = $business_id->business_id;
        });





        static::updating(function ($product) {
            $business_id = Category::where('id', $product->category_id)->first();

            $product->business_id = $business_id->business_id;
        });
    }
}
