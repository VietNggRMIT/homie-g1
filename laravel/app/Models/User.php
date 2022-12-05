<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ======================================================================
    // Slug URL, part 3/3
    public function getRouteKeyName()
    {
        return 'user_real_name';
    }

    protected $table = 'user'; // to bind 'User.php' with 'user' MySQL table

    public function listings()
    {
        return $this->hasMany('App\Models\Listing');
    }
    public function blogs()
    {
        return $this->hasMany('\App\Models\Blog');
    }
    function reviews()
    {
        return $this->hasManyThrough('App\Models\Review', 'App\Models\Listing');
    }
    function applications()
    {
        return $this->hasManyThrough('App\Models\Application', 'App\Models\Listing');
    }
    function images()
    {
        return $this->hasManyThrough('App\Models\ListingImage', 'App\Models\Listing');
    }
}
