<?php

namespace App\Http\Controllers;

use App\ROD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RODController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rodData = ROD::all();
        // $rodData = ROD::paginate(100);
        // return response()->json($rodData);
        // dd($rodData);
        return view('rod.index', compact('rodData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rod.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate (size is in KB)
        $request->validate([
            'rod_file' => 'required',
        ]);

        // Read file contents...
        $contents = file_get_contents($request->rod_file->path());
        // dd($contents);

        // ...or just move it somewhere else (eg: local `storage` directory or S3)
        // $newPath = $request->rod_file->store('rod_file', 's3');

        $rawArray = explode("\n", $contents);
        unset($rawArray[count($rawArray) - 1]);  // remove last empty row 
        $lastArray = end($rawArray);

        // print_r($lastArray);
        // dd($lastArray);


        unset($rawArray[count($rawArray) - 1]);  // remove last line summary row 

        $finalArray = [];
        foreach ($rawArray as $key => $raw) {
            $finalArray[$key]['investor_id'] = preg_replace('/\s\s+/', '', substr($raw, 0, 14));
            $finalArray[$key]['participant_code'] = preg_replace('/\s\s+/', '', substr($raw, 14, 3));
            $finalArray[$key]['participant_branch_code'] = preg_replace('/\s\s+/', '', substr($raw, 17, 3));
            $finalArray[$key]['participant_name'] = preg_replace('/\s\s+/', '', substr($raw, 20, 60));
            $finalArray[$key]['cds_account_number'] = preg_replace('/\s\s+/', '', substr($raw, 80, 9));
            $finalArray[$key]['investor_name'] = preg_replace('/\s\s+/', '', substr($raw, 89, 60));
            $finalArray[$key]['address1'] = preg_replace('/\s\s+/', '', substr($raw, 149, 45));
            $finalArray[$key]['address2'] = preg_replace('/\s\s+/', '', substr($raw, 194, 45));
            $finalArray[$key]['town'] = preg_replace('/\s\s+/', '', substr($raw, 239, 25));
            $finalArray[$key]['post_code'] = preg_replace('/\s\s+/', '', substr($raw, 264, 5));
            $finalArray[$key]['state_code'] = preg_replace('/\s\s+/', '', substr($raw, 269, 1));
            $finalArray[$key]['country_code'] = preg_replace('/\s\s+/', '', substr($raw, 270, 3));
            $finalArray[$key]['nationality'] = preg_replace('/\s\s+/', '', substr($raw, 273, 3));
            $finalArray[$key]['race'] = preg_replace('/\s\s+/', '', substr($raw, 276, 1));
            $finalArray[$key]['investor_type'] = preg_replace('/\s\s+/', '', substr($raw, 277, 2));
            $finalArray[$key]['telephone_number'] = preg_replace('/\s\s+/', '', substr($raw, 279, 14));
            $finalArray[$key]['stock_code'] = preg_replace('/\s\s+/', '', substr($raw, 293, 6));
            $finalArray[$key]['serial_number'] = preg_replace('/\s\s+/', '', substr($raw, 299, 8));
            $finalArray[$key]['quantity_allotted'] = preg_replace('/\s\s+/', '', substr($raw, 307, 10));
            $finalArray[$key]['status_code'] = preg_replace('/\s\s+/', '', substr($raw, 317, 2));
            $finalArray[$key]['beneficiary_code'] = preg_replace('/\s\s+/', '', substr($raw, 319, 1));
            $finalArray[$key]['account_qualifier'] = preg_replace('/\s\s+/', '', substr($raw, 320, 120));
            $finalArray[$key]['allow_duplicate'] = preg_replace('/\s\s+/', '', substr($raw, 440, 1));
            $finalArray[$key]['rejection_codes'] = preg_replace('/\s\s+/', '', substr($raw, 441, 19));
            $finalArray[$key]['old_investor_id'] = preg_replace('/\s\s+/', '', substr($raw, 460, 8));
        }
        foreach (array_chunk($finalArray, 500) as $smallArray) {
            ROD::insert($smallArray);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ROD  $rOD
     * @return \Illuminate\Http\Response
     */
    public function show(ROD $rOD)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ROD  $rOD
     * @return \Illuminate\Http\Response
     */
    public function edit(ROD $rOD)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ROD  $rOD
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ROD $rOD)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ROD  $rOD
     * @return \Illuminate\Http\Response
     */
    public function destroy(ROD $rOD)
    {
        //
    }
}
