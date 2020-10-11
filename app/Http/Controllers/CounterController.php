<?php

namespace App\Http\Controllers;

use App\ROD;
use App\Counter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counterData = Counter::all();
        
        return view('counter.index', compact('counterData'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('counter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'counter_name' => 'required',
            'description' => 'required',
        ]);

        $counter = Counter::create([
            'counter_name' => $request['counter_name'],
            'description' => $request['description'],
            'created_by' => Auth::user()->id,
        ]);

        return response()->json($counter, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('hi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $counter = DB::table('counters')->where('counter_id', $id)->get();
        $counter = $counter[0];
        // $counter = json_encode($counter);
        // dd($counter);
        return view('counter.edit', compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'counter_name' => 'required',
            'description' => 'required',
        ]);

        $counter = Counter::find($id);
        $counter->counter_name = $request['counter_name'];
        $counter->description = $request['description'];
        $counter->save();

        return response()->json($counter, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
