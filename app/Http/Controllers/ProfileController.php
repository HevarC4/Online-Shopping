<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index()
    {
        $posts = Transaction::where('user_id',auth()->id())->with('post')->get();

        $totalPrice = $posts->sum(function($transaction) {
            $discount = $transaction->post->discount ?? 0;
            $discountedPrice = $transaction->post->price * (1 - $discount);
            return $discountedPrice > 0 ? $discountedPrice : 0;
        });

        $totalCount = $posts->count();
        return view('public.user.index',compact('posts','totalPrice','totalCount'));
    }

    public function edit(string $id)
    {
        return view('public.user.edit');
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . auth()->id() . '|email',
            'password' => 'nullable|min:6|confirmed',
            'address' => 'nullable'
        ]);

        $user = User::find(auth()->id());
        if ($request->password) {
            $user->update($request->only('name', 'email', 'password', 'address'));
        } else {
            $user->update($request->only('name', 'email', 'address'));
        }
        return redirect()->back();
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
            'post_id' => 'required',
        ]);

        Post::findOrFail($request->post_id);

        $request->merge(['user_id' => auth()->id()]);
        Comment::create($request->only('user_id', 'post_id', 'comment'));

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        //
    }
}
