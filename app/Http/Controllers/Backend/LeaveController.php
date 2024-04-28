<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Backend\Leave;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_records = DB::table('leaves')->select('*')->get();
        return view('user.leave-record', compact('all_records'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $user = User::find(request()->user()->id);

        if ($user->register_status != 'pending') {
            $validate_status = $request->validate([
                'leave_type' => ['required', 'string', 'max:25'],
                'start_date' => ['required', 'string', 'max:25'],
                'end_date' => ['required', 'string', 'max:25'],
                'reason_leave' => ['required', 'string', 'max:500'],
            ]);
            
            if ($validate_status) {
                $store_status = DB::table('leaves')->insert([
                    'leave_type' => $request->leave_type,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'reason_leave' => $request->reason_leave,
                    'user_id' => request()->user()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'review_status' => 'pending',
                ]);

                if ($store_status) {
                    return redirect()->route('user.leave-records')->with('success', 'Leave application submitted.');
                } else {
                    return redirect()->route('user.leave-records')->with('error', 'Leave application submission failed.');
                }
            }
        } else {
            return redirect()->route('user.leave-form')->with('error', 'Cannot submit. Please wait for admin approval for pending status.');
        }
    }


}
