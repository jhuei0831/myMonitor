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

    // 新增
    public function store(Request $request)
    {
        $request->request->add(['user_id' => Auth::user()->id]);
        Notification::create($request->except('_token', '_method'));
        $this->log->write_log('notification', $request->except(['_token']), 'create');
        return back()->with('success', '快速廣播新增成功');
    }

    public function edit($id)
    {
        $notification = Notification::findOrFail($id);
        return view('manage/notifications/edit', compact('notification'));
    }

    // 更新
    public function update(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);
        foreach ($request->except(['_token']) as $key => $value) {
            $notification->$key = $request->$key;
        }
        $notification->save();
        $this->log->write_log('notification', $request->except(['_token']), 'update');
        return back()->with('success', '快速廣播修改成功');
    }

    // 刪除
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        Notification::destroy($id);
        $this->log->write_log('notification', $notification, 'delete');
        return back()->with('success', '快速廣播刪除成功');
    }

    // 廣播
    public function notifications(Request $request)
    {
        foreach ($request->except(['_token']) as $key => $value) {
            $$key = $request->$key;
        }
        event(new OrderNotification($title, $icon, $message, $footer, $width));
        $this->log->write_log('notification', $request->except(['_token']), 'post');
        return back()->with('success', '廣播成功');
    }

    // 快速廣播
    public function quick_notifications($id)
    {
        $notification = Notification::findOrFail($id);
        foreach ($notification->toarray() as $key => $value) {
            $$key = $notification->$key;
        }
        event(new OrderNotification($title, $icon, $message, $footer, $width));
        $this->log->write_log('notification', $notification->toarray(), 'post');
        return back()->with('success', '廣播成功');
    }
}
