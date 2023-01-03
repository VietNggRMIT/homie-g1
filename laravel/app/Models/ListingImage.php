<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingImage extends Model
{
    use HasFactory;
    protected $table = 'listing_image'; // to bind 'ListingImage.php' with 'image' MySQL table
    protected $guarded = []; // Related to upload files/images

    public function listing()
    {
        return $this->belongsTo('App\Models\Listing');
    }
}
