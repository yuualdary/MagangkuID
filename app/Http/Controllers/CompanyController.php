<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;

class CompanyController extends Controller
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

        $CreateCompany=company::create([
            'companyname'=>$request->companyname,
            'companyaddress'=>$request->companyaddress,
            'companyprofile'=>$request->companyprofile,
            'companyweb'=>$request->companyweb
        ]);

        if($request->hasfile('companyphoto')){
            $image = $request->file('companyphoto');

            $image_ext = $image->getClientOriginalExtension();
            $image_name = $CreateCompany->id.'.'.$image_ext;
            $image_folder = '/photos/companyphoto/';
            $image_location = $image_folder.$image_name;

            try{

                $image->move(public_path($image_folder),$image_name);

                $CreateCompany->update([
                    'companyphoto'=>$image_location,
                ]);
                // dd($request->companyphoto);

            }catch(\Exception $e){
                
                return response()->json([
                    'response'=>'01',
                    'response_message'=>'Fail Add Photo',
                    'data'=>$data,
                ],200);             
            }

            $data['companies']=$CreateCompany;

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
