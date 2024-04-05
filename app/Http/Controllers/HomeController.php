<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->check()) {
            // Check the user's role
            if (auth()->user()->role == 1) {
                // Redirect the user to the dashboard route
                return redirect()->route('dashboard');
            } else {
                // Redirect the user to the index route
                return redirect()->route('index');
            }
        }
        else {
            // If the user is not authenticated, redirect to the login page
            return redirect()->route('login');
        }

    }
}
