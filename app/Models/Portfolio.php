<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $table = 'portfolios';
    protected $fillable = ['user_id', 'project_title', 'budget', 'duration', 'about', 'website', 'image', 'portfolio_link' ];

    public function user()
    {
        return $this->belongsTo('App\Models\Portfolio');
    }
}
