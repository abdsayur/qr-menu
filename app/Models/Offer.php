<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function business()
    {

        return $this->belongsTo(Business::class);
    }

    use HasFactory;
}
