<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OrderNotification;

class MonitorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function notifications(Request $request)
    {
        event(new OrderNotification($request->fire));
        return back()->with('success', '廣播成功');
    }
}
