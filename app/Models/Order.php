<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\OrderProduct;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "business_id",
        "employee_id",
        "type",
        "table_id",
        "client_name",
        "discount_option",
        "client_phone",
        "client_address",
        "delivery_charge",
        "status",
        "discount",
        "total",
        "order_no",
        "printed",
        "cost"
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
