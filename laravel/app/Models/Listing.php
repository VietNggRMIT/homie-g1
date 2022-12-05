<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\SpatialBuilder;
use MatanYadaev\EloquentSpatial\Objects\Point;

/**
 * App\Models\Listing
 *
 * @property int $id
 * @property string $listing_name
 * @property string|null $listing_description
 * @property string $listing_address_subdivision_1
 * @property string|null $listing_address_subdivision_2
 * @property string|null $listing_address_subdivision_3
 * @property \MatanYadaev\EloquentSpatial\Objects\Geometry|null $listing_address_coordinate
 * @property int $listing_price
 * @property int $listing_available
 * @property int $listing_specification_bathroom
 * @property int $listing_specification_bedroom
 * @property int $listing_specification_size
 * @property int $listing_specification_owner
 * @property int $listing_specification_tenant
 * @property int $user_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Application[] $applications
 * @property-read int|null $applications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ListingImage[] $listingimages
 * @property-read int|null $listingimages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
 * @property-read int|null $reviews_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\ListingFactory factory(...$parameters)
 * @method static SpatialBuilder|Listing newModelQuery()
 * @method static SpatialBuilder|Listing newQuery()
 * @method static SpatialBuilder|Listing orderByDistance(string $column, \MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn, string $direction = 'asc')
 * @method static SpatialBuilder|Listing orderByDistanceSphere(string $column, \MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn, string $direction = 'asc')
 * @method static SpatialBuilder|Listing query()
 * @method static SpatialBuilder|Listing whereContains(string $column, \MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static SpatialBuilder|Listing whereCreatedAt($value)
 * @method static SpatialBuilder|Listing whereCrosses(string $column, \MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static SpatialBuilder|Listing whereDisjoint(string $column, \MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static SpatialBuilder|Listing whereDistance(string $column, \MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn, string $operator, int|float $value)
 * @method static SpatialBuilder|Listing whereDistanceSphere(string $column, \MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn, string $operator, int|float $value)
 * @method static SpatialBuilder|Listing whereEquals(string $column, \MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static SpatialBuilder|Listing whereId($value)
 * @method static SpatialBuilder|Listing whereIntersects(string $column, \MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static SpatialBuilder|Listing whereListingAddressCoordinate($value)
 * @method static SpatialBuilder|Listing whereListingAddressSubdivision1($value)
 * @method static SpatialBuilder|Listing whereListingAddressSubdivision2($value)
 * @method static SpatialBuilder|Listing whereListingAddressSubdivision3($value)
 * @method static SpatialBuilder|Listing whereListingAvailable($value)
 * @method static SpatialBuilder|Listing whereListingDescription($value)
 * @method static SpatialBuilder|Listing whereListingName($value)
 * @method static SpatialBuilder|Listing whereListingPrice($value)
 * @method static SpatialBuilder|Listing whereListingSpecificationBathroom($value)
 * @method static SpatialBuilder|Listing whereListingSpecificationBedroom($value)
 * @method static SpatialBuilder|Listing whereListingSpecificationOwner($value)
 * @method static SpatialBuilder|Listing whereListingSpecificationSize($value)
 * @method static SpatialBuilder|Listing whereListingSpecificationTenant($value)
 * @method static SpatialBuilder|Listing whereNotContains(string $column, \MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static SpatialBuilder|Listing whereNotWithin(string $column, \MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static SpatialBuilder|Listing whereOverlaps(string $column, \MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static SpatialBuilder|Listing whereSrid(string $column, string $operator, int|float $value)
 * @method static SpatialBuilder|Listing whereTouches(string $column, \MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static SpatialBuilder|Listing whereUpdatedAt($value)
 * @method static SpatialBuilder|Listing whereUserId($value)
 * @method static SpatialBuilder|Listing whereWithin(string $column, \MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn)
 * @method static SpatialBuilder|Listing withDistance(string $column, \MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn, string $alias = 'distance')
 * @method static SpatialBuilder|Listing withDistanceSphere(string $column, \MatanYadaev\EloquentSpatial\Objects\Geometry|string $geometryOrColumn, string $alias = 'distance')
 * @mixin \Eloquent
 */
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
        'listing_specification_size',
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
