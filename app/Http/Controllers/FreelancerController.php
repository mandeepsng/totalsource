<?php

namespace App\Http\Controllers;

use App\Models\Freelancer;
use App\Models\User;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function get_freelancer_data(Request $request)
    {
        $user = User::find($request->id);
        $company = $user->freelancer;

        return response()->json(['user'=> $user]);
    }

    public function get_freelancer_data_by_userid($id)
    {
        $user = User::find($id);
        $user->freelancer;

        return response()->json(['user'=> $user]);
    }

    public function update_freelancer_profile(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'contact' => 'required',
            'about' => 'required',
            'website' => 'required',
        ]);

        $user = User::find($request->id);
        $user->freelancer;

        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->freelancer->about = request('about');
        $user->freelancer->contact = request('contact');
        $user->freelancer->website = request('website');
        $user->save();
        $user->freelancer->save();

        if($user){
            return response()->json(['success' => 'Profile updated Successfully !']);
        }
        return response()->json(['error' => 'something went wrong !']);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function show(Freelancer $freelancer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function edit(Freelancer $freelancer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Freelancer $freelancer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Freelancer  $freelancer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Freelancer $freelancer)
    {
        //
    }
}
