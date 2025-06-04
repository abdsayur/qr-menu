<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = "order_product";
    protected $fillable = [
        "business_id",
        "product_id",
        "order_id",
        "qty",
        "product_price",
        "product_name",
        "notes",
        "garnishes",
        "cost"
    ];
    protected $casts = [
        'garnishes' => 'array',
    ];

    // public function setGarnishesAttribute($value)
	// {
	//     $garnishes = [];

	//     foreach ($value as $array_item) {
	//         if (!is_null($array_item['key'])) {
	//             $garnishes[] = $array_item;
	//         }
	//     }

	//     $this->attributes['garnishes'] = json_encode($garnishes);
	// }

    // public function order()
    // {
    //     return $this->belongsTo(Order::class);
    // }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}