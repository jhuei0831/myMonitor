<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Facades
use Illuminate\Support\Facades\Auth;

# Model
use App\Notification;
use App\Channel;

# Event
use App\Events\OrderNotification;

# Service
use App\Services\LogService;
use App\Services\UserService;

class NotificationController extends Controller
{
    private $log, $user;

    public function __construct(LogService $log, UserService $user)
    {
        $this->log = $log;
        $this->user = $user;
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user_id = Auth::user()->id;
            return $next($request);
        });
    }

    public function index($channel_id)
    {
        $notifications = Notification::where(['user_id' => $this->user_id, 'channel_id' => $channel_id])->paginate();
        return view('manage/notifications/index',compact('notifications'));
    }

    public function create($channel_id)
    {
        $channel = Channel::where('id', $channel_id)->get();
        return view('manage/notifications/create',compact('channel'));
    }

    // 新增
    public function store(Request $request)
    {
        $request->request->add(['user_id' => $this->user_id]);
        // dd($request->all());
        Notification::create($request->except('_token', '_method'));
        $this->log->write_log('notifications', $request->except(['_token']), 'create');
        return back()->with('success', '快速廣播新增成功');
    }

    public function edit($id)
    {
        $notification = Notification::findOrFail($id);
        $this->user->check_user($notification->user_id, $this->user_id);
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
        $this->log->write_log('notifications', $request->except(['_token']), 'update');
        return back()->with('success', '快速廣播修改成功');
    }

    // 刪除
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $this->user->check_user($notification->user_id, $this->user_id);
        Notification::destroy($id);
        $this->log->write_log('notifications', $notification, 'delete');
        return back()->with('success', '快速廣播刪除成功');
    }

    // 廣播
    public function notifications(Request $request)
    {
        foreach ($request->except(['_token']) as $key => $value) {
            $$key = $request->$key;
        }
        event(new OrderNotification($this->user_id, $title, $icon, $message, $footer, $width));
        $this->log->write_log('notifications', $request->except(['_token']), 'post');
        return back()->with('success', '廣播成功');
    }

    // 快速廣播
    public function quick_notifications($id)
    {
        $notification = Notification::findOrFail($id);
        $this->user->check_user($notification->user_id, $this->user_id);
        foreach ($notification->toarray() as $key => $value) {
            $$key = $notification->$key;
        }
        event(new OrderNotification($this->user_id, $title, $icon, $message, $footer, $width));
        $this->log->write_log('notifications', $notification->toarray(), 'post');
        return back()->with('success', '廣播成功');
    }
}
