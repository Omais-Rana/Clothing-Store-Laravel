<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogSingle(Request $request)
    {
        $post = Post::whereSlug($request->slug)->firstOrFail();
        return view('blog-single', compact('post'));
    }
}
