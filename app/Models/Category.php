<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products()
    {

        return $this->hasMany(Product::class)->where('status',1);
    }

    public function business()
    {

        return $this->belongsTo(Business::class);
    }
}