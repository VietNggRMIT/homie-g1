<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $custom_blogs = Blog::with('user')
            ->get();

        return response()
            ->view('directory_blog.blogs', ['blogs' => $custom_blogs], 200);
    }

    /**
     * Show the form for creating a new resource.
     * @param $user the user that creates this blog
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return response()
            ->view('directory_blog.blog_create', ['from' => 'create', 'user' => $request->user], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog;
        $blog->blog_name = $request->blog_name;
        $blog->blog_description = $request->blog_description;
        $blog->user_id = $request->user_id;
        $blog->save();
        return redirect()->action([BlogsController::class, 'show'],['blog' => $blog]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $custom_blog = Blog::with('user')
            ->find($blog->id);

        return response()
            ->view('directory_blog.blog', ['blog' => $custom_blog], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $custom_blog = Blog::with('user')
        ->find($blog->id);

        return response()
            ->view('directory_blog.blog_create', ['blog' => $custom_blog, 'from' => 'update'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $blog_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $blog_id)
    {
        $new_blog = Blog::find($blog_id);
        
        $new_blog->blog_name = $request->blog_name;
        $new_blog->blog_description = $request->blog_description;
        $new_blog->user_id = $request->user_id;
        $new_blog->save();
        return redirect()->route('blogs.show', ['blog' => $new_blog]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
