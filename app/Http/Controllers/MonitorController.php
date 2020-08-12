<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OrderMonitor;

class MonitorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fire(Request $request)
    {
        event(new OrderMonitor($request->fire));
        return back();
    }
}
