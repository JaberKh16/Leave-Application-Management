<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function user_manage(){
        $user_records = DB::table('users')->select('*')->where('role', '!=', 'admin')->get();
        return view('admin.user-manage', compact('user_records'));
    }

    public function leave_manage(){
        $leave_records = DB::table('leaves')->select('*')->where('review_status', '!=', 'active')->get();

        // extracting user IDs from leave records
        $userIds = $leave_records->pluck('user_id')->toArray();

        // fetch users corresponding to these user IDs
        $users = DB::table('users')->whereIn('id', $userIds)->get();
        return view('admin.leave-manage', [
            'leave_records' => $leave_records,
            'users' => $users,
        ]);
        
    }


    public function update_leave_status($table, $id, $value)
    {
        $fields = array('review_status' => $value);
        
        $update = DB::table($table)->where('id', $id)->update($fields);
        if ($update != null) {
            $action = ($value == 'active') ? 'activated' : 'inactivated';
            Log::info($update);
            return redirect()->back()->with('success',"Record has been successfully " . $action);
        } else {
            return redirect()->back()->with('error',"Something went wrong, please try again");
        }
    }
}
