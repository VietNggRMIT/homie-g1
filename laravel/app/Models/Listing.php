<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\SpatialBuilder;
use MatanYadaev\EloquentSpatial\Objects\Point;

class Listing extends Model
{
    use HasFactory;
    protected $table = 'listing'; // to bind 'Listing.php' with 'listing' MySQL table

    protected $fillable = [
        'listing_name',
        'listing_description',
        'listing_address_subdivision_1',
        'listing_address_subdivision_2',
        'listing_address_subdivision_3',
        'listing_address_coordinate',
        'listing_price',
        'listing_rating',
        'listing_available',
        'listing_specification_bathroom',
        'listing_specification_bedroom',
        'listing_specification_owner',
        'listing_specification_tenant',
    ];

    protected $casts = [
        'listing_address_coordinate' => Point::class,
    ];

    public function newEloquentBuilder($query): SpatialBuilder
    {
        return new SpatialBuilder($query);
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
