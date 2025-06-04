<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class Business extends Model
{
    use HasFactory;


    public function users()
    {
        return $this->belongsToMany(User::class,"buisness_user");
    }

    

    public function categories()
    {


        return $this->hasMany(Category::class);
    }

    public function offers()
    {


        return $this->hasMany(Offer::class);
    }



    protected static function boot()
    {
        parent::boot();

        static::creating(function ($business) {


            // produce a slug based on the activity title
            $slug = Str::slug($business->name);

            // check to see if any other slugs exist that are the same & count them
            $count = Business::where("slug", 'LIKE', '%' . $slug . '%')->count();

            // if other slugs exist that are the same, append the count to the slug
            $business->slug = $count ? "{$slug}-{$count}" : $slug;
        });


        // static::updating(function ($business) {
        //     // produce a slug based on the activity title
        //     $slug = Str::slug($business->name);

        //     // check to see if any other slugs exist that are the same & count them
        //     $count = Business::where("slug", 'LIKE', '%' . $slug . '%')->count();

        //     // if other slugs exist that are the same, append the count to the slug
        //     $business->slug = $count ? "{$slug}-{$count}" : $slug;
        // });
    }
}
