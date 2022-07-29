<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'role',
        'email',
        'password',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function company()
    {
        return $this->hasOne('App\Models\Company');
    }

    public function agency()
    {
        return $this->hasOne('App\Models\Agency');
    }

    public function freelancer()
    {
        return $this->hasOne('App\Models\Freelancer');
    }

    public function portfolio()
    {
        return $this->hasMany('App\Models\Portfolio');
    }


    static function getUserName($id)
    {
        $res = self::find($id)->get();
        $name = $res[0]->first_name." ".$res[0]->last_name;
        return $name;
    }

    static function getUserProfileimage($id)
    {
        $res = self::find($id)->get()->first();
        $name = $res->image;
        return $name;
    }

    static function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $userObj = User::find($request->id);
        $userObj->image = $imageName;

        if($userObj->save()){
            return response()->json(['message' => 'Image uploaded successfully']);
        }else{
            return response()->json( ['message' =>  'Something went wrong!']);

        }

    }

    public function sendPasswordResetNotification($token)
    {
        $url = env('FRONTEND_APP_URL').'/reset-password?token='. $token;
        $this->notify(new \App\Notifications\MailResetPasswordNotification($url));
    }



    public function mannual_approval($id, $prop)
    {
        $userObj = User::find($id);
        if($prop == true){
            $userObj->second_approval = 1;
        }else{
            $userObj->second_approval = Null;
        }

        if($userObj->save()){
            return ['prop' => $prop, 'save' => 1 , 'to_email' => $userObj['email']];
        }else{
            return 0;
        }
    }




}
