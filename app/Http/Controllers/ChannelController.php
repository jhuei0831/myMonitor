<?php

namespace App\Http\Controllers;

# Model
use App\Channel;

# Facades
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

# Service
use App\Services\LogService;
use App\Services\UserService;

class ChannelController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels = Channel::where('user_id', $this->user_id)->paginate();
        return view('manage/channels/index', compact('channels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage/channels/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['uuid' => Str::uuid(), 'user_id' => $this->user_id, 'password' => Hash::make($request->password)]);
        Channel::create($request->except('_token', '_method'));
        $this->log->write_log('channel', $request->except(['_token']), 'create');
        return back()->with('success', '頻道新增成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channel = Channel::findOrFail($id);
        $this->user->check_user($channel->user_id, $this->user_id);
        return view('manage/channels/edit', compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $channel = Channel::findOrFail($id);
        $channel->name = $request->name;
        $channel->save();
        $this->log->write_log('channel', $request->except(['_token']), 'update');
        return back()->with('success', '頻道修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channel = Channel::findOrFail($id);
        $this->user->check_user($channel->user_id, $this->user_id);
        Channel::destroy($id);
        $this->log->write_log('channel', $channel, 'delete');
        return back()->with('success', '頻道刪除成功');
    }
}
