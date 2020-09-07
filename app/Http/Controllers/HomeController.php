<?php

namespace App\Http\Controllers;

# Model
use App\Channel;

# Facades
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

# Event
use App\Events\OrderMonitor;

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
        $channels = Channel::where('user_id', Auth::user()->id)->paginate();
        return view('home', compact('channels'));
    }

    public function fire()
    {
        event(new OrderMonitor('hello world'));
        return view('home');
    }
}
