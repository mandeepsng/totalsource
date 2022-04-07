<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
Use App\Models\Jobs;
use App\Models\User;
use App\Models\Proposal;
use App\Http\Requests\StoreJobsRequest;
use Mail;
use App\Http\Controllers\MediaUploadController;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allJobs = Jobs::all();
        return response()->json(['alljobs'=> $allJobs]);
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
    public function store(StoreJobsRequest $request)
    {
        $data = $request->all();

        $company_name = company::getCompanyNameById($request->hiring_client_id);
//        if($company_name == null){
//            $company_name = "unknown";
//        }

//        return response()->json(['success',  $company_name]);
        $jobs = Jobs::create([
            'name' => request('name'),
            'location' => request('location'),
            'type' => request('type'),
            'salary' => request('budget'),
            'description' => request('description'),
            'expected_duration' => request('expected_duration'),
            'skill_ids' => request('skill_ids'),
            'hiring_client_id' => request('hiring_client_id'),
            'company_name' => $company_name,
        ]);


//        if($data){
//            $obj = new MediaUploadController;
//            dd($obj);
//        }
        if($data){


            return response()->json(['success',  'Jobs Created Successfully.']);
        }else{

            return response()->json(['data' => request('name')]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_job_by_id(Request $request)
    {
//        $alljobs = Jobs::where('id', '=', $request->id)->get();
        $alljobs = Jobs::find($request->id);
        $alljobs->proposal;
//        dd($alljobs->hiring_client_id);
        $company_name = company::getCompanyNameById($alljobs->hiring_client_id);
        return response()->json(['alljobs'=> $alljobs, 'company_name' => $company_name ]);
    }


    public function clientJobViewById($id)
    {
        $alljobs = Jobs::find($id);
        $jobs = $alljobs->proposal;
        $data = [];


        foreach($jobs as $k => $val){
            $freelancerName = User::getUserName($val->working_user_id);
//            echo "<pre>";
//            print_r($val);
//            echo "</pre>";
            $data[] = array(
                'working_user_name' => $freelancerName,
                'id' => $val->id,
                'jobs_id' => $val->jobs_id,
                'working_user_id' => $val->working_user_id,
                'proposal_time' => $val->proposal_time,
                'proposal_desc' => $val->proposal_desc,
                'bidding_price' => $val->bidding_price,
                'bidding_type' => $val->bidding_type,
                'current_proposal_status' => $val->current_proposal_status,
                'created_at' => $val->created_at,
            );
        }

        return response()->json(['alljobs' => $alljobs, 'proposal' => $data ]);

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
    public function update_job_by_id(Request $request)
    {
        $data = $request->all();
//        dd($data);
//        $jobs = Jobs::update([
//            'name' => request('name'),
//            'location' => request('location'),
//            'type' => request('type'),
//            'salary' => request('budget'),
//            'description' => request('description'),
//            'expected_duration' => request('expected_duration'),
//            'skill_ids' => request('skill_ids'),
//        ])->where('id', request('id'));
        $job = Jobs::find(request('id'));

        $job->name = request('name');
        $job->location = request('location');
        $job->type = request('type');
        $job->salary = request('budget');
        $job->description = request('description');
        $job->expected_duration = request('expected_duration');
        $job->skill_ids = request('skill_ids');
        $job->save();


//        dd($job);

        if($job->save()){
            return response()->json(['success',  'Jobs Updated Successfully!!']);
        }else{

            return response()->json(['data' => request('name')]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function jobPostDestroyById(Request $request)
    {
        $id = request('id');
        $job = jobs::find($id);
        if($job->delete()){
            return response()->json(['message',  'Jobs Delete Successfully!!']);
        }else{
            return response()->json(['message',  'something went wrong']);
        }
    }

    public function getClientJobPost(Request $request)
    {
        $alljobs = Jobs::where('hiring_client_id', '=', $request->id)->get();

        $data = array();
        foreach( $alljobs as $job ){
            $proposal = jobs::find($job->id);
            $proposal->proposal;

            $data[]['data'] = $proposal;
//            echo "<pre>"; print_r($proposal->proposal); echo "</pre>";

        }

//        dd('dd');
        return response()->json(['alljobs' => $data]);
//        return response()->json(['alljobs'=> $alljobs, 'proposal' => $proposal]);
    }


    public function getClientJobPostById($id)
    {
        $alljobs = Jobs::where('hiring_client_id', '=', $id)->get();

        $data = array();
        foreach( $alljobs as $job ){
            $proposal = jobs::find($job->id);
            $proposal->proposal;
            $data[]['data'] = $proposal;
        }
        return response()->json(['alljobs' => $data]);
    }

    public function jobsCount(Request $request)
    {
        $alljobs = Jobs::where('hiring_client_id', '=', $request->id)->get()->count();
        return response()->json(['totaljobs'=> $alljobs]);

    }

    public function sendEmail(Request $request)
    {
        $data = array('name'=>"Mandeep Singh");

        Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to('vobawi6676@tonaeto.com', 'total dfsdf')->subject
            ('Laravel Basic Testing Mail');
            $message->from('1mandeep2021@gmail.com','Mandeep sigh');
        });
        echo "Basic Email Sent. Check your inbox.";
    }



}
