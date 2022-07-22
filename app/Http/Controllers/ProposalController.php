<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Contract;
use App\Models\Jobs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;
use PHPUnit\Framework\Constraint\Count;

class ProposalController extends Controller
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
        $proposal_time = $request['data']['proposal_time'];
        $proposal_desc = $request['data']['proposal_desc'];
        $bidding_price = $request['data']['bidding_price'];
        $job_id = $request['data']['id'];
        $working_user_id = $request['data']['working_user_id'];

        $job = Jobs::find($job_id);
        $proposal = new Proposal;
//        dd( $proposal );
        $proposal->proposal_time = $proposal_time;
        $proposal->proposal_desc = $proposal_desc;
        $proposal->bidding_price = $bidding_price;
        $proposal->working_user_id = $working_user_id;
        $proposal->bidding_type = 'fixed';
        $proposal->current_proposal_status = 0;
        $job->proposal()->save($proposal);

        if($job){
            return response()->json(['success' => 'Your bidd place Successfully!' ]);
        }
        return response()->json(['error' => 'something went wrong !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        //
    }


    public function get_proposal_by_id(Request $request)
    {
        $job = Jobs::find($request->id);
        $job->proposal;

        return response()->json(['data' => $job ]);

    }

    public function check_exit_bid_by_id(Request $request)
    {
        $job = Jobs::find($request->jobId);
        if($job->status == 1 ){
            $hired = 1;
        }else{
            $hired = 0;
        }


        $user = Proposal::select('*')->where([
            ["working_user_id", "=", $request->userId],
            ["jobs_id", "=", $request->jobId]
        ])->get();
        $count = count($user);
        return response()->json(['count' => $count, 'hired' => $hired ]);
    }


    public function getFreelancerJobBiddById($id)
    {
        $ids = [];
        $job_idsByFreelancer = Proposal::select('jobs_id')->where([
            ["working_user_id", "=", $id],
        ])->paginate(10);

        foreach( $job_idsByFreelancer as $id ){
            $ids[] = $id->jobs_id;
        }

        $alljobs = Jobs::find($ids);

        $data = array();
        foreach( $alljobs as $job ){
            $proposal = jobs::find($job->id);
            $proposal->proposal;
            $data[]['data'] = $proposal;

        }
        return response()->json(['alljobs' => $data, 'alldata' => $job_idsByFreelancer]);
    }

    public function get_approved_FreelancerJobBiddById($id)
    {
        $obj = new Proposal();
        return $obj->get_jobs_approved_freelancer_by_id($id);
    }

    public function getFreelancerJobBiddById_not($id)
    {
        $ids = [];
        $job_idsByFreelancer = Proposal::select('jobs_id')->where([
            ["working_user_id", "=", $id],
        ])->paginate(10);

        foreach( $job_idsByFreelancer as $id ){
            $ids[] = $id->jobs_id;
        }

        $alljobs = Jobs::find($ids);

        $data = array();
        $approvedData = array();
        foreach( $alljobs as $job ){
            $proposal = jobs::find($job->id);
            $proposal->proposal;
//            $data[]['data'] = $proposal;

            $obj = new Contract;
            $working_user_id = $obj->getApproved_user_id($job->id);

            $data[]['data'] = [
                'name' => $proposal->name,
                'type' => $proposal->type,
                'created_at' => $proposal->created_at,
                'id' => $proposal->id,
                'working_user_id' => $working_user_id,
                'proposal_count' => count($proposal->proposal),
            ];

        }








        return response()->json(['alljobs' => $data, 'alldata' => $job_idsByFreelancer]);
    }

}
