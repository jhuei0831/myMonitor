<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Facades
use Illuminate\Support\Facades\Auth;

# Model
use App\Notification;

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
        $notifications = Notification::paginate();
        return view('manage/notifications/index',compact('notifications'));
    }

    public function create()
    {
        return view('manage/notifications/create');
    }

    public function store(Request $request)
    {
        $request->request->add(['user_id' => Auth::user()->id]);
        Notification::create($request->except('_token', '_method'));
        return back()->with('success', '快速廣播新增成功');
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