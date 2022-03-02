<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $fillable = ['name', 'location', 'type', 'salary', 'description', 'expected_duration', 'hiring_client_id', 'skill_ids'];


    static function get_client_posted_jobs($id)
    {
        return self::where('hiring_client_id', '=', $id)->get();
    }

}
