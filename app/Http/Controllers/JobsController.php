<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Jobs;
use App\Models\User;
use App\Http\Requests\StoreJobsRequest;

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
