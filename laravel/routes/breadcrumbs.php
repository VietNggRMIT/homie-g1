<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

use App\Models\User;
use App\Models\Listing;
use App\Models\Blog;

//use Illuminate\Support\Facades\Config;
//Config::set('breadcrumbs.view', 'partials.breadcrumbs');

// Home
Breadcrumbs::for('breadcrumb_home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('route_home'));
});

//=========================================================================================

// Home > Listings
Breadcrumbs::for('breadcrumb_listings', function (BreadcrumbTrail $trail) {
    $trail->parent('breadcrumb_home');
    $trail->push('Property Listings', route('listings.index'));
});

// Home > Listings > [Listing]
Breadcrumbs::for('breadcrumb_listing', function (BreadcrumbTrail $trail, Listing $listing) {
    $trail->parent('breadcrumb_listings');
    $trail->push($listing->listing_name, route('listings.show', $listing));
});

//=========================================================================================

// Home > Blogs
Breadcrumbs::for('breadcrumb_blogs', function (BreadcrumbTrail $trail) {
    $trail->parent('breadcrumb_home');
    $trail->push('Blogs', route('blogs.index'));
});

// Home > Blogs > [Blog]
Breadcrumbs::for('breadcrumb_blog', function (BreadcrumbTrail $trail, Blog $blog) {
    $trail->parent('breadcrumb_blogs');
    $trail->push($blog->blog_name, route('blogs.show', $blog));
});

//=========================================================================================

// Home > Users > [User]
Breadcrumbs::for('breadcrumb_user', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('breadcrumb_home');
    $trail->push($user->user_real_name, route('users.show', $user));
});

//=========================================================================================

// Home > About
Breadcrumbs::for('breadcrumb_about', function (BreadcrumbTrail $trail) {
    $trail->parent('breadcrumb_home');
    $trail->push('About', route('route_about'));
});

// Home > Fallback
//Breadcrumbs::for('breadcrumb_fallback', function (BreadcrumbTrail $trail) {
//    $trail->parent('breadcrumb_home');
//    $trail->push('Fallback', route('route_fallback'));
//});
