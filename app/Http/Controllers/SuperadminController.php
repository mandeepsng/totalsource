<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Jobs;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Company;
use App\Models\Agency;
use App\Models\Freelancer;

class SuperadminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/error-404');

    }

    public function adminHome()
    {
        return view('admin/index_admin');
    }

    public function allClientList()
    {
        $user = User::where('role', '=', '2')->get();
        return view('admin/client-list')->with(['user' => $user]);
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

    public function clientProjectById($id)
    {
        $alljobs = Jobs::where('hiring_client_id', '=', $id)->get();

        return view('admin.client-project')->with(['alljobs' => $alljobs]);
    }

    public function allProposalByJobId($id)
    {
        $alljobs = Jobs::find($id);
        $jobs = $alljobs->proposal;
        $data = [];


        foreach($jobs as $k => $val){
            $freelancerName = User::getUserName($val->working_user_id);
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

        return view('admin.client-job')->with(['alljobs' => $alljobs, 'proposal' => $data ]);
    }


    public function allFreelancerList()
    {
        $user = User::where('role', '=', '3')->get();
        return view('admin/freelancer-list')->with(['user' => $user]);
    }

    public function freelancerJobsById($id)
    {
        $alljobs = Proposal::where('working_user_id', '=', $id)
            ->select('proposals.working_user_id','proposals.current_proposal_status','jobs.*')
            ->leftJoin('jobs', 'proposals.jobs_id', '=', 'jobs.id')
            ->get();

        return view('admin.freelancer-project')->with(['alljobs' => $alljobs]);
    }

    public function userData($id)
    {
        $user = User::find($id);
        $role = $user->role;
        $data= [];
        if($role == '2' ){
            $user->company;
            $data = array(
                'name' => $user->first_name." ".$user->last_name,
                'email' => $user->email,
                'contact' => $user->company->contact,
                'location' => $user->company->location,
                'about' => $user->company->about,
            );
        }elseif ($role == '3'){
            $user->freelancer;
            $data = array(
                'name' => $user->first_name." ".$user->last_name,
                'email' => $user->email,
                'contact' => $user->freelancer->contact,
                'location' => $user->freelancer->location,
                'about' => $user->freelancer->about,
            );
        }elseif ($role == '4'){
            $user->agency;
            $data = array(
                'name' => $user->first_name." ".$user->last_name,
                'email' => $user->email,
                'contact' => $user->agency->contact,
                'location' => $user->agency->location,
                'about' => $user->agency->about,
            );
        }

        return view('admin.user-profile')->with(['role' => $role, 'user' => $data]);
    }

    public function allAgencyList()
    {
        $user = User::where('role', '=', '4')->get();
        return view('admin/agency-list')->with(['user' => $user]);
    }


}
