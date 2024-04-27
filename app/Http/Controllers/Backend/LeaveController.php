<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\Leave;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.leave-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'leave_type' => ['required', 'string', 'max:25'],
            'start_date' => ['required', 'string', 'max:25'],
            'end_date' => ['required', 'string', 'max:25'],
            'reason_leave' => ['required', 'string', 'max:500'],
        ]);

        
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

        if($store_status){
            return redirect()->route('user.leave-records')->with('success', 'Leave application submitted.');
        }else{
            return redirect()->route('user.leave-records')->with('error', 'Leave application submitted failed.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'leave_type' => ['required', 'string', 'max:25'],
            'start_date' => ['required', 'string', 'max:25'],
            'end_date' => ['required', 'string', 'max:25'],
            'reason_leave' => ['required', 'string', 'max:500'],
        ]);

        $update_status = DB::table('leaves')
            ->where('id', $id) 
            ->update([
                'leave_type' => $request->leave_type,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'reason_leave' => $request->reason_leave,
                'updated_at' => Carbon::now(),
                'review_status' => 'pending',
            ]);

  
        if ($update_status) {
            return redirect()->route('')->with('success', 'Leave application updated successfully.');
        } else {
            return redirect()->route('')->with('error', 'Failed to update leave application.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete_status = DB::table('leaves')
            ->where('id', $id)
            ->delete();

        if ($delete_status) {
            return redirect()->route('')->with('success', 'Leave application deleted successfully.');
        } else {
            return redirect()->route('')->with('error', 'Failed to delete leave application.');
        }

    }
}
