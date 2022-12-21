<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blog
 *
 * @property int $id
 * @property string $blog_name
 * @property string $blog_description
 * @property int $user_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\BlogFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBlogDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBlogName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUserId($value)
 * @mixin \Eloquent
 */

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog'; // to bind 'Blog.php' with 'blog' MySQL table
    /**
     * The attributes that are mass assignable. 
     * Need this when using "one line" statement in BlogsController::store
     * @v ar array<int, string>
     */
    // protected $fillable = [
    //     'blog_name',
    //     'blog_description',
    //     'user_id',
    // ];
    
    // Slug URL, part 3/3
    public function getRouteKeyName()
    {
        return 'blog_name';
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
