<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterUser $request){
        try{

        }catch(Exception $e){
            return response()->json($e);
        }
        $user =new User();
        $user->name= $request->name;
        $user->email=$request->email;
        $user->password= Hash::make($request->password,[
            'rounds'=>12
        ]);
        $user->save();
        if(auth()->attempt($request->only(['email','password']))){
            $user=auth()->user();
            
        }
        return response()->json([
            'status_code' =>200,
            'status_message'=>'Le post a été modifié',
            'user'=>$user
        ]);


    }
    public function login(){

    }
}
