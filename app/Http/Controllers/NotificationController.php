<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Event
use App\Events\OrderNotification;

# Service
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
        $title = $request->title;
        $icon = $request->icon;
        $message = $request->message;
        $footer = $request->footer;
        $data = ['title' => $title, 'icon' => $icon, 'message' => $message, 'footer' => $footer];

        event(new OrderNotification($title, $icon, $message, $footer));
        $this->log->write_log('notification', $data, 'post');
        return back()->with('success', '廣播成功');
    }
}
