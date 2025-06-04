<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Employee extends Model
{
    use HasFactory;


    public function business()
    {

        return $this->belongsTo(Business::class);
    }




    public static function boot()
    {
        parent::boot();

        static::creating(function ($employee) {
            $random = Str::random(40);

            $employee->token = $random;
        });
    }
}
