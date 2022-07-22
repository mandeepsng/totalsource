<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    protected $table = 'proposals';
    protected $fillable = ['working_user_id', 'proposal_time', 'proposal_desc', 'bidding_price', 'bidding_type', 'current_proposal_status' ];

    public function jobs()
    {
        return $this->hasOne('App\Models\Jobs');
    }


    public function get_jobs_approved_freelancer_by_id($id)
    {
        $ids = [];
        $job_idsByFreelancer = Proposal::select('jobs_id')->where([
            ["working_user_id", "=", $id],
            ["current_proposal_status", "=", 1],
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




}
