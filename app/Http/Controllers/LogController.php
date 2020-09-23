<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Facades
use Illuminate\Support\Facades\DB;

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
}
