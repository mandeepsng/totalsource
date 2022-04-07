<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Jobs;
use App\Models\User;
use Illuminate\Http\Request;
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
        $proposal->current_proposal_status = 'active';
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
        $user = Proposal::select('*')->where([
            ["working_user_id", "=", $request->userId],
            ["jobs_id", "=", $request->id]
        ])->get();
        $count = count($user);
        return response()->json(['count' => $count ]);
    }

}
