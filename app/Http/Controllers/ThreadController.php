<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\thread;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ShowThread = thread::Select("*")
                    ->get();
                            
        
        $data['threads'] = $thread;

        return response()->JSON([
            'response_code'=>'00',
            'response_message'=>'Showing All Thread',
            'data'=>$data,
        ],200);

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

        $thread = thread::create([
                'thread'=>$request->thread,
                'description'=>$request->description,
                'user_id'=>$request->user_id,
                // 'user_id'=>Auth::user()->id
        ]);
        
        if($request->hasfile('thread_photo')){
            
            $image = $request->file('thread');
            $image_extension = $image->getClientOriginalExtension();
            $image_name=$thread->id.'.'.$image_extension;
            $image_folder='/photos/threadphoto/';
            $image_location = $image_folder.$image_name;


            try{
                $image->move(public_path($image_folder),$image_name);

                $campaign->update([
                    'thread_photo'=>$image_location,
                ]);
            }catch(\Exception $e){
                return response()->json([
                    'response_code'=>'01',
                    'response_message'=>'Failed Add Campaign',
                    'data' =>$data,
                ],200);
            }

        $data['threads'] = $thread;

        return response()->json([
            'response_code'=>'00',
            'response_message'=>'Success Create Data',
            'data'=>$data
        ],200);

       }

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
    public function destroy($id)
    {
        //
    }
}
