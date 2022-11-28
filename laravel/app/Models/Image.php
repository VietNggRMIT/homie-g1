<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'image'; // to bind 'Image.php' with 'image' MySQL table

    public function listing()
    {
        return $this->belongsTo('App\Models\Listing');
    }
}
