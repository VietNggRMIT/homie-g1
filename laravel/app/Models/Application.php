<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $table = 'application'; // to bind 'Review.php' with 'review' MySQL table

    public function listing()
    {
        return $this->belongsTo('App\Models\Listing');
    }
}
