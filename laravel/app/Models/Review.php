<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
//    public $timestamps = false;
    protected $table = 'review'; // to bind 'Review.php' with 'review' MySQL table

    public function listing()
    {
        return $this->belongsTo('App\Models\Listing');
    }
}
