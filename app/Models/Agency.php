<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;
    protected $table = 'agencies';
    protected $fillable = ['about', 'contact', 'user_account_id', 'location'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
