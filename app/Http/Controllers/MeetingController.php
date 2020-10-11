<?php

namespace App\Http\Controllers;

use App\ROD;
use App\Counter;
use App\Meeting;
use App\Resolution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
    
    public function index()
    {
        // $meetingList = DB::table('meetings')->get();
        $meetingList = DB::table('meetings')
            ->join('counters', 'meetings.counter_id', '=', 'counters.counter_id')
            ->get();
        // dd($meetingList);
       
        return view('meeting.index', compact('meetingList'));
    }

    
    public function create()
    {
        // $counterList = Counter::all();
        // $counterList = Counter::all();
        // $counterList = DB::table('counters')->get();
        $counterList = DB::table('counters')->select('counter_id', 'counter_name')->get();
        // dd($counterList);
       
        return view('meeting.create', compact('counterList'));
    }

    
    public function store(Request $request)
    {
        // print_r(json_decode($request->reso_data));
        // $test = json_decode($request->reso_data);
        // dd($test[0]->reso_no);
        // dd($request->all());
        $request->validate([
            'counter_id' => 'required',
            'title' => 'required',
            'total_no' => 'required',
            'reso_data.*.reso_no' => 'required|string',
            'reso_data.*.reso_description' => 'required|string',
        ]);

        $meeting = Meeting::create([
            'counter_id' => $request['counter_id'],
            'title' => $request['title'],
            'total_no' => $request['total_no'],
            'created_by' => Auth::user()->id,
        ]);
        foreach ($request->reso_data as $reso) {
            $resolution = Resolution::create([
                'reso_no' => $reso['reso_no'],
                'meeting_id' => $meeting->id,
                'type' => Auth::user()->id,
                'created_by' => Auth::user()->id,
                'description' => $reso['reso_description'],
            ]);
        }

        return response()->json($meeting, 201);
    }

  
    public function show($meeting)
    {
        //
    }

  
    public function edit($id)
    {
        $meeting = DB::table('meetings')
            ->join('counters', 'meetings.counter_id', '=', 'counters.counter_id')
            ->where('meetings.meeting_id', $id)
            ->first();
        return view('meeting.edit', compact('meeting'));
    }

   
    public function update(Request $request, Meeting $meeting)
    {
        //
    }

    
    public function destroy(Meeting $meeting)
    {
        //
    }
}
