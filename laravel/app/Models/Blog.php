<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog'; // to bind 'Blog.php' with 'blog' MySQL table

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}