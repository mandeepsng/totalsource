<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Jobs;
use App\Models\User;
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

        $jobs = Jobs::create([
            'name' => request('name'),
            'location' => request('location'),
            'type' => request('type'),
            'salary' => request('budget'),
            'description' => request('description'),
            'expected_duration' => request('expected_duration'),
            'skill_ids' => request('skill_ids'),
            'hiring_client_id' => request('hiring_client_id'),
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
        $alljobs = Jobs::where('id', '=', $request->id)->get();

        return response()->json(['alljobs'=> $alljobs]);
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

        return response()->json(['alljobs'=> $alljobs]);
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
