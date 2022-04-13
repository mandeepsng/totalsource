<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proposal;

class Jobs extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $fillable = ['name', 'location', 'type', 'salary', 'description', 'expected_duration', 'hiring_client_id', 'skill_ids', 'company_name'];


    static function get_client_posted_jobs($id)
    {
        return self::where('hiring_client_id', '=', $id)->get();
    }

    public function proposal()
    {
        return $this->hasMany('App\Models\Proposal');
    }

    public function contract()
    {
        return $this->hasOne('App\Models\Contract');
    }


}
