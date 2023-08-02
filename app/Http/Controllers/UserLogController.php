<?php

namespace App\Http\Controllers;

use App\Models\UserLog;
use Illuminate\Http\Request;

class UserLogController extends Controller
{
    //index
    public function index() {
        $logs = UserLog::latest()->paginate(10);
        foreach ($logs as $log) {
            $json = $log->data;
            $decodedData = json_decode($json, true);
            if ($decodedData && (json_last_error() == JSON_ERROR_NONE)) {
                $log->data = $decodedData;
            }
        }

        // dd($logs);
        return view('userlog.index', compact('logs'));
    }
}
