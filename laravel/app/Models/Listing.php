<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $table = 'listing'; // to bind 'Listing.php' with 'listing' MySQL table

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function applications()
    {
        return $this->hasMany('\app\Models\Application');
    }
    public function listingimages()
    {
        return $this->hasMany('\app\Models\ListingImage');
    }
}
