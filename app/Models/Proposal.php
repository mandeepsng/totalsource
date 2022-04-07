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

}
