<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\candidate;
use Auth;
use File;


class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->status);
        // $test = $request->status;
        
        $Candidate = candidate::create([
            "job_id" =>$request->job_id,
            "status" =>$request->status,
            "user_id" => Auth::user()->id,

        ]);

        if($request->hasFile('cv')){
            $file = $request->file('cv');
            $file_ext = $file->getClientOriginalExtension();
            $file_name = $Candidate->id.'.'.$file_ext;
            $file_folder = '/photos/cv/';
            $file_location = $file_folder.$file_name;

            try{

          
                $file->move(public_path($file_folder),$file_name);
                    // return 'Error saving the file.';

               
                $Candidate->update([
                    'cv'=>$file_location,
                
                ]);

            }catch(\Exception $e){
                return response()->json([
                    'response'=>'01',
                    'response_message'=>'Fail Add CV',
                ],200);

            }
        }


        return response()->json([
            'response_code'=>'00',
            'response_message'=>'Success Create Data',
            'Candidate'=>$Candidate
        ],200);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //next delete ketika status user == reject atau > 1 bulan

        $Candidate = candidate::with('tags')->where([['id','=',$id],['user_id','=',$request->user_id],['job_id','=',$request->job_id],
                   ])->first();
        // dd($Candidate);
        // foreach($Candidate as $C){
        //     dd($C->cv);

        //     $GetPath = $C->cv;
        // }
        // dd($Candidate);
        $GetPath = $Candidate->cv;
        file::delete(public_path($GetPath));

        $Candidate->delete();
        
        
        return response()->json([
            'response_code'=>'00',
            'response_message'=>'Success Delete Data',
        ],200);

    }
}
