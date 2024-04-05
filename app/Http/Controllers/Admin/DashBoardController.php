<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $category = Category::count();
        $post = Post::count();
        $transaction = Transaction::count();


        return view('admin.dashboard',compact('user','category','post','transaction'));
    }
}
