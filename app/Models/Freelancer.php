<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasFactory;
    protected $table = 'freelancers';
    protected $fillable = ['user_account_id', 'location', 'contact', 'experience', 'website', 'portfolio_link', 'about' ];

    public function user()
    {
        return $this->belongsTo('App\Models\Freelancer');
    }
}
