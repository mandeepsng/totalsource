<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function get_company_data(Request $request)
    {
        $user = User::find($request->id);
        $company = $user->company;

        return response()->json(['user'=> $user]);
    }

    public function update_company_profile(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'contact' => 'required',
            'about' => 'required',
            'website' => 'required',
            'company_name' => 'required',
        ]);

        $user = User::find($request->id);
        $user->company;

        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->company->about = request('about');
        $user->company->contact = request('contact');
        $user->company->website = request('website');
        $user->company->company_name = request('company_name');
        $user->save();
        $user->company->save();

        if($user){
            return response()->json(['success' => 'Profile updated Successfully !']);
        }
        return response()->json(['error' => 'something went wrong !']);
    }


}
