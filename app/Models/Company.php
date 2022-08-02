<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'company';
    protected $fillable = ['about', 'contact', 'user_account_id', 'location', 'company_name'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    static function getCompanyNameById($id)
    {
        if($id){
            $company = self::where('user_id', $id)->get()->first();
            return @$company->company_name;
        }
    }

}
