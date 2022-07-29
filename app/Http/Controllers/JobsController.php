<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
Use App\Models\Jobs;
use App\Models\User;
use App\Models\Contract;
use App\Models\Proposal;
use App\Http\Requests\StoreJobsRequest;
use Mail;
use App\Http\Controllers\MediaUploadController;
use function PHPUnit\Framework\isNull;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $pagination_data = Jobs::paginate(10);
        foreach($pagination_data as $k => $val){
            $clientImage = User::getUserProfileimage($val->hiring_client_id);
//            echo "<pre>";
//            print_r($val);
//            echo "</pre>";
            $data[] = array(
                'id' => $val->id,
                'name' => $val->name,
                'location' => $val->location,
                'type' => $val->type,
                'salary' => $val->salary,
                'company_name' => $val->company_name,
                'hiring_client_id' => $val->hiring_client_id,
                'description' => $val->description,
                'status' => $val->status,
                'clientImage' => @$clientImage,
            );
        }

        return response()->json(['alljobs'=> $data, 'pagination_data' => $pagination_data , 'status' => 200]);
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

        $company = Company::select(['company_name'])->where('user_id', $request->hiring_client_id)->first();

        $company_name = $company['company_name'];
//        return response()->json( $company_name );
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

    public function jobViewById($id)
    {
        $alljobs = Jobs::find($id);
        $alljobs->proposal;
//        $company_name = company::getCompanyNameById($alljobs->hiring_client_id);
        return response()->json(['alljobs'=> $alljobs ]);
    }


    public function clientJobViewById($id)
    {
        $alljobs = Jobs::find($id);
        $jobs = $alljobs->proposal;
        $data = [];

        if($alljobs->status == 1 ){
            $hired = 1;
        }else{
            $hired = 0;
        }

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

        return response()->json(['alljobs' => $alljobs, 'proposal' => $data, 'hired' => $hired ]);

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
        $alljobs = Jobs::where('hiring_client_id', '=', $id)->paginate(10);

        $data = array();
        foreach( $alljobs as $job ){
            $proposal = jobs::find($job->id);
            $proposal->proposal;
            $data[]['data'] = $proposal;
        }
        return response()->json(['alljobs' => $data, 'alldata' => $alljobs]);
    }



    public function jobsCount(Request $request)
    {
        $alljobs = Jobs::where('hiring_client_id', '=', $request->id)->get()->count();
        return response()->json(['totaljobs'=> $alljobs]);

    }

    public function sendEmail($data)
    {
//        dd($data);
//        $data = array('name'=>"Mandeep Singh");

        Mail::send('emails.verifyemail', $data, function($message) {
            $message->to('fidasa5745@3dinews.com', 'total dfsdf')->subject
            ('Laravel Basic Testing Mail 000');
            $message->from('1mandeep2021@gmail.com', $message->name );
        });
        echo "Basic Email Sent. Check your inbox.";
    }



    public function create_contract(Request $request)
    {
        $data = $request->all();
        $job = Jobs::find(request('id'));
        $job->status = '1';
        $job->save();

        $contract = new Contract;
        $contract->jobs_id = request('id');
        if($request->has('freelancer_id')) {
            $contract->freelancer_id = request('freelancer_id');
        }
        if($request->has('proposal_id')) {
            $contract->proposal_id = request('proposal_id');
            $proposal = Proposal::find(request('proposal_id'));
            $proposal->current_proposal_status = '1';
            $proposal->save();
        }

        $company = User::find( request('company_id') );
        $working_user = User::find( request('freelancer_id') );

        $contract->company_id = request('company_id');
        $contract->start_time = now();
        $contract->end_time = now();
        $contract->payment_type_id = "22";
        $contract->payment_amount = "change later";
        $contract->conversation = json_encode([$company->google_uid, $working_user->google_uid ]);

        $job->contract()->save($contract);

        if($job){

            return response()->json([ 'conversation' => [$company->google_uid, $working_user->google_uid ] ,'status' => 200, 'message' => 'Contact Created Successfully!!', 'company_google_uid' => $company->google_uid , 'freelancer_google_uid' => $working_user->google_uid  ]);
        }else{

            return response()->json([ 'status' => 400 , 'message' => 'Something went wrong!']);

        }

    }


    public function jobHiredOrNot($id)
    {
        $job = Jobs::find($id);
        if($job->status == 1 ){
            $hired = '1';
        }else{
            $hired = '0';
        }

        return response()->json(['hired' => '$hired' ]);
    }

    public function searchJobsListing(Request $request)
    {
        if( empty($request->keyword) ){
            $allJobs = Jobs::paginate(10);
            return response()->json(['alljobs'=> $allJobs, 'status' => 300]);
        }else{

        $search = $request->keyword;
        $allJobs = Jobs::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();

            if(count($allJobs) > 0){
                return response()->json(['status' => 200,  'alljobs'=> $allJobs]);
            }
        return response()->json(['status' => 400, 'alljobs'=> 'nothing found']);
        }


    }



}
