<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'contracts';
    protected $fillable = ['jobs_id', 'proposal_id', 'company_id', 'freelancer_id', 'start_time', 'end_time', 'payment_type_id', 'payment_amount' ];


    public function jobs()
    {
        return $this->hasOne('App\Models\Jobs');
    }
}
