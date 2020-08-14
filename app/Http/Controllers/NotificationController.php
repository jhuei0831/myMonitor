<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OrderNotification;
use App\Services\LogService;

class NotificationController extends Controller
{
    private $log;

    public function __construct(LogService $log)
    {
        $this->log = $log;
        $this->middleware('auth');
    }

    public function index()
    {
        return view('manage/notifications/index');
    }

    public function notifications(Request $request)
    {
        event(new OrderNotification($request->fire));
        $this->log->write_log('notification', $request->fire, 'post');
        return back()->with('success', '廣播成功');
    }
}
