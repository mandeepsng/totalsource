<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jobs;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'contracts';
    protected $fillable = ['jobs_id', 'proposal_id', 'company_id', 'freelancer_id', 'start_time', 'end_time', 'payment_type_id', 'payment_amount' ];


    public function jobs()
    {
        return $this->hasOne('App\Models\Jobs');
    }

    public function getApproved_user_id($jobId){
        $working_user_id = Contract::where('jobs_id', '=', $jobId )->pluck('freelancer_id')->first();
            return $working_user_id;
    }


}
