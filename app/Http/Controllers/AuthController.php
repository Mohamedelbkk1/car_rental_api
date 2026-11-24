<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register( Request $request){
        $data = $request->validate([
            "name"=>'required|string|max:150',
            "email"=>"required|email|unique:users",
            "password"=>"required|min:6"
        ]);
        $user=User::create($data);
        return response()->json([
            'user'=>$user,
            'token'=>$user->createToken('auth')->plainTextToken,
        ],201);
    }

    public function login(Request $request)
    {
        $data=$request->validate([
            'email'=>"required|email",
            'password'=>'required'
        ]);

        $user=User::where('email',$data['email'])->first();
        if(!$user||!Hash::check($data['password'],$user->password)){
            return response()->json(['message'=>"email ou password est incorrect"]);
        }
        return response()->json([
            'user'=>$user,
            'token'=>$user->createToken('auth')->plainTextToken,
        ]);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message'=>'deconnecte']);
    }

}
