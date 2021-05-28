<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobToTag;
use App\Models\Company;
use App\Models\Candidate;
use Auth;
use App\Http\Resources\JobResource;





class JobsController extends Controller
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

        

        $CreateJobs=job::create([
            'title'=>$request->title,
            'fee'=>$request->fee,
            'description'=>$request->description,
            'requirement'=>$request->requirement,
            'company_id'=>$request->company_id,
        ]);

            
        $data['jobs']=$CreateJobs;
        
        //Get Selected Data

        // $checklist = $_POST['tag_id'];
        
        // $countcheck = count($checklist);

        // dd($countcheck);
        
        foreach($request->tag_id  as $Selected){
            $CreateMapping = JobToTag::create([
                'tag_id'=>$Selected,
                'job_id'=>$CreateJobs->id,//Auth::user()->id;
            ]);
        }
        $data['job_to_tags']=$CreateMapping;

        return response()->json([
            'response_code'=>'00',
            'response_message'=>'Success Create Data',
            'data'=>$data
        ],200);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        //


        $jobtotag = jobtotag::with('tags')->get();
        $job = job::with('companies')->get();

        


        return response()->json([
            'response_code'=>'00',
            'response_message'=>'Success Create Data',
            'job'=> $job,
            'jobtotag'=>$jobtotag,

        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ChooseJob(Request $request)
    {
        //
        $Request->GetJobId = $ThisID;

        $UserToJob = usertojob::create([
            "UserID" => Auth::user()->id,
            "JobID"=>$request->JobID
        ]);

        return response()->json([
            'response_code'=>'00',
            'response_message'=>'Success Create Data',
        

        ],200);
    }

    public function DetailJob(Request $request,$id)
    {
        //
        // dd($request->user_id);
        $DetailJob = job::with('companies')->where('id',$id)->get();

        $Candidate = candidate::with('tags')->where('user_id',Auth::user()->id)->orWhere('job_id',$id)->get();
        
   
        if($Candidate == NULL){
            $IsApplied = False;

        }else{
            $IsApplied = True;
            $Canditate = Null;

        }

        return response()->json([
            'response_code'=>'00',
            'response_message'=>'Showing Data',
            'Candidate'=>$Candidate,
            'IsApplied' => $IsApplied

        ],200);
        

        
 
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
