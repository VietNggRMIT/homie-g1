<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $user_email_address
 * @property string $user_phone_number
 * @property string $user_password
 * @property string $user_real_name
 * @property string $user_image_path
 * @property string $user_description
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Application[] $applications
 * @property-read int|null $applications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Blog[] $blogs
 * @property-read int|null $blogs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ListingImage[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Listing[] $listings
 * @property-read int|null $listings_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserEmailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserRealName($value)
 * @mixin \Eloquent
 */
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
