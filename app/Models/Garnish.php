<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garnish extends Model
{
    use HasFactory;

    public function product()
    {

        return $this->belongsTo(Product::class);
    }




    public static function boot()
    {
        parent::boot();

        static::creating(function ($garnish) {

            $business_id = Product::where('id', $garnish->product_id)->first();

            $garnish->business_id = $business_id->business_id;
        });





        static::updating(function ($garnish) {

            $business_id = Product::where('id', $garnish->product_id)->first();

            $garnish->business_id = $business_id->business_id;
        });
    }
}
