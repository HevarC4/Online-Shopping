<?php

namespace App\Http\Controllers;

use App\Models\FavCart;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function show()
    {
        return view('public.index');
    }
    public function index(Request $request)
    {
        $users = User::all();

        $posts = [];

        if ($request->q)
            $posts = Post::where('title', 'like', '%' . $request->q . '%')->get();
        else
            $posts = Post::all();


        $favId = [];

        if (Auth::user()) {
            $array = FavCart::where('user_id', Auth::id())->where('state', 0)->get('post_id');
            foreach ($array as $value) {
                $favId[] = $value->post_id;
            }
        }
        return view('public.index', compact('posts', 'users', 'favId'));
    }

    public function showPost($id)
    {
        $data = Post::where('id', $id)->with([
            'categories' => function ($q) {
                $q->with(['category']);
            },
            'comments' => function ($q) {
                $q->with(['user'])->latest();
            }
        ])->findOrFail($id);

        $check = FavCart::where('post_id', $data->id)
            ->where('state', 1)
            ->where('user_id', auth()->id())
            ->value('id');


        return view('public.detail', compact('data', 'check'));
    }
    public function AddToFavCard($id, $cart)
    {
        Post::findOrFail($id);
        $check = FavCart::where('user_id', Auth::id())->where('post_id', $id)->where('state', $cart)->first();
        if ($check) {
            $check->delete();
        } else {
            FavCart::create([
                'user_id' => Auth::id(),
                'post_id' => $id,
                'state' => $cart,
            ]);
        }


        return redirect()->back();
    }
}
