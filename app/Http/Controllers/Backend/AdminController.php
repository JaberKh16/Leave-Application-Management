<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Mail\ApprovalMail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function dashboard(){
        $count_records = $this->total_counts();
        $user_records = $count_records[0];
        $leave_records = $count_records[1];
        $user_active_records = $count_records[2];
        $user_inactive_records = $count_records[3];
        $leave_approve_records = $count_records[4];
        $leave_reject_records = $count_records[5];
        return view('admin.dashboard', compact('user_records', 'leave_records', 'user_active_records',
        'user_inactive_records', 'leave_approve_records', 'leave_reject_records'));
    }

    public function total_counts()
    {
        $user_records = DB::table('users')->select('*')->count();
        $leave_records = DB::table('leaves')->select('*')->count();
        $user_active_records = DB::table('users')->select('*')->where('register_status', '=', 'approved')->count();
        $user_inactive_records = DB::table('users')->select('*')->where('register_status', '!=', 'approved')->count();
        $leave_approve_records = DB::table('leaves')->select('*')->where('review_status', '=', 'approved')->count();
        $leave_reject_records = DB::table('leaves')->select('*')->where('review_status', '!=', 'approved')->count();
        $count_records = [ $user_records, $leave_records, $user_active_records, $user_inactive_records, $leave_approve_records, $leave_reject_records];
        return $count_records;
    }

    public function user_manage(){
        $user_records = DB::table('users')->select('*')->where('role', '!=', 'admin')->get();
        return view('admin.user-manage', compact('user_records'));
    }

    public function leave_manage(){
        $leave_records = DB::table('leaves')->select('*')->where('review_status', '!=', 'active')->get();

        // extracting user IDs from leave records
        $user_ids = $leave_records->pluck('user_id')->toArray();

        // fetch users corresponding to these user IDs
        $users = DB::table('users')->whereIn('id', $user_ids)->get();
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
            $action = ($value == 'approved') ? 'Approved' : 'Rejected';
            Log::info($update);
            
            // send mail
            $this->send_leave_status_mail();
            return redirect()->back()->with('success',"Record has been successfully -" . $action);
        } else {
            return redirect()->back()->with('error',"Something went wrong, please try again");
        }
    }

    public function send_leave_status_mail()
    {
        $leave_records = DB::table('leaves')->where('review_status', '!=', 'approved')->get();

        $users = DB::table('users')
                    ->whereIn('id', $leave_records->pluck('user_id'))
                    ->get();
                    

        $mail_message = [
            'subject' => 'Leave Application Approval',
            'body' => 'Leave Approval is considered for approval',
        ];
   
        foreach ($users as $user) {
            // send email 
            Mail::to($user->email)->send(new ApprovalMail($user, $mail_message));
        }
    }


    public function update_user_status($table, $id, $value)
    {
        $fields = array('register_status' => $value);
        
        $update = DB::table($table)->where('id', $id)->update($fields);
        if ($update != null) {
            $action = ($value == 'approved') ? 'Approved' : 'Rejected';
            Log::info($update);
            // send mail
            $this->send_user_status_mail();
            return redirect()->back()->with('success',"Record has been successfully -" . $action);
        } else {
            return redirect()->back()->with('error',"Something went wrong, please try again");
        }
    }

    public function send_user_status_mail()
    {
        $leave_records = DB::table('leaves')->where('review_status', '!=', 'approved')->get();

        $users = DB::table('users')
                    ->whereIn('id', $leave_records->pluck('user_id'))
                    ->get();
                    

        $mail_message = [
            'subject' => 'User Activation Approval',
            'body' => 'User Registered is considered for approval',
        ];
   
        foreach ($users as $user) {
            // send email 
            Mail::to($user->email)->send(new ApprovalMail($user, $mail_message));
        }
    }

}
