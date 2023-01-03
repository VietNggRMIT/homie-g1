<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $table = 'listing'; // to bind 'Listing.php' with 'listing' MySQL table
    protected $guarded = []; // Related to upload files/images

    protected $fillable = [
        'listing_name',
        'listing_description',
        'listing_address_subdivision_1',
        'listing_address_subdivision_2',
        'listing_address_subdivision_3',
        'listing_address_latitude',
        'listing_address_longitude',
        'listing_price',
        'listing_rating',
        'listing_available',
        'listing_specification_bathroom',
        'listing_specification_bedroom',
        'listing_specification_size',
        'listing_specification_owner',
        'listing_specification_tenant',
    ];

    // Slug URL, part 3/3 (part 1 was in web.php, part 2 was in its Controller file)
    public function getRouteKeyName()
    {
        return 'listing_name';
    }

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
        return $this->hasMany('\App\Models\Application');
    }
    public function listingimages()
    {
        return $this->hasMany('\App\Models\ListingImage');
    }
}
