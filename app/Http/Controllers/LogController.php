<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Facades
use Illuminate\Support\Facades\DB;

# Model
use App\Log;


class LogController extends Controller
{
    public function index()
    {
        $logs = DB::table('log')->paginate();
        return view('manage.log.index',compact('logs'));
    }

    public function detail($id)
    {
        $log = DB::table('log')->where('id', $id)->first();
        return view('manage.log.detail', compact('log'));
    }

    public function search(Request $request)
    {
        $ip = $request->ip;
        $browser = $request->browser;
        $action = $request->action;
        $table = $request->table;
        // dd($request->all());
        $logs_search = Log::when($ip, function ($q) use ($ip) {
            return $q->where('ip', 'like', '%' . $ip . '%');
        })
        ->when($browser, function ($q) use ($browser) {
            return $q->where('browser', $browser);
        })
        ->when($action, function ($q) use ($action) {
            return $q->where('action', $action);
        })
        ->when($table, function ($q) use ($table) {
            return $q->where('table', $table);
        })
        ->paginate()
        ->appends($request->all());

        return view('manage.log.search', compact('logs_search'));
    }
}
