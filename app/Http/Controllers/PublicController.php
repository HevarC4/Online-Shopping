<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $users= User::all();

        $posts = [];

        if ($request->q)
            $posts = Post::where('title', 'like', '%'.$request->q.'%')->get();
        else
            $posts = Post::all();

        return view('public.index', compact('posts','users'));
    }
}
