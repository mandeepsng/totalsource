<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $fillable = ['name', 'location', 'type', 'salary', 'description', 'expected_duration', 'hiring_client_id', 'skill_ids'];

}
