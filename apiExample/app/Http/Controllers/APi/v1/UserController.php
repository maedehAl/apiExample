<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\v1\User as UserResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class UserController extends Controller
{
    public function login(Request $request)
    {
        //validation date
        $validData=$this->validate($request,[
            //بررسی میکنه همچین مقداری وجود داره
            'email'=>'required|exists:users',
            'password'=>'required',

        ]);
        //check log in user
        if (! auth()->attempt($validData)) {
                return response([
                 'data'=>'اشتباه',
                    'status'=>'error'
                ],403);
            //return response
        }
        //only 1 device stay log in
      auth()->user()->update([
          'api_token'=> str::random(100)
      ]);
        return new UserResource(auth()->user());
    }

    public function register(Request $request)
    {
        $validData=$this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5'],

        ]);

$user=User::create([
    'name' => $validData['name'],
    'email' => $validData['email'],
    'password' => bcrypt($validData['password']),
    'api_token'=>str::random(100)
//    'remember_token'=>str::random(10),
]);
return new UserResource($user);
    }
}
