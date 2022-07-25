<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class MediaUploadController extends Controller
{
    function profileImageInsert(Request $request)
    {


        $oldImg = User::find($request->id);

        if($oldImg->image != NULL){

            $isExist = Storage::exists("images/".$oldImg->image);
            if($isExist){
                unlink("images/".$oldImg->image);

            }

        }


        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $userObj = User::find($request->id);
        $userObj->image = $imageName;

        if($userObj->save()){
            return response()->json([ 'image' => $userObj->image ,'message' => 'Image uploaded successfully']);
        }else{
            return response()->json( ['message' =>  'Something went wrong!']);

        }


    }
}
