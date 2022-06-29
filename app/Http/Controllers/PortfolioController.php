<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use App\Http\Requests\StorePortfolioRequest;
use Auth;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $portfolio = $user->portfolio()->paginate(10);
        return response()->json(['portfolio' => $portfolio ]);
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
//        dd('sdfdsf');
        $user = Auth::user();
//        $user = User::find($request->id);
        $portfolio = new Portfolio;
        $portfolio->project_title = $request->project_title;
        $portfolio->budget = $request->budget;
        $portfolio->duration = $request->duration;
        $portfolio->about = $request->about;
        $portfolio->website = $request->website;
//        $portfolio->portfolio_link = $request->portfolio_link;
        $save = $user->portfolio()->save($portfolio);

        if($save){
            return response()->json(['success' => 'Portfolio Added Successfully!' ]);
        }
        return response()->json(['error' => 'something went wrong !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        return response()->json(['portfolio' => $portfolio ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(StorePortfolioRequest $request, Portfolio $portfolio)
    {
        $portfolio->project_title = $request->project_title;
        $portfolio->budget = $request->budget;
        $portfolio->duration = $request->duration;
        $portfolio->about = $request->about;
        $portfolio->website = $request->website;

        $save = $portfolio->save();

        if($save){
            return response()->json(['success' => 'Portfolio updated Successfully!' ]);
        }
        return response()->json(['error' => 'something went wrong !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $delete = $portfolio->delete();

        if($delete){
            return response()->json(['success' => 'Portfolio deleted Successfully!' ]);
        }
        return response()->json(['error' => 'something went wrong !']);
    }
}
