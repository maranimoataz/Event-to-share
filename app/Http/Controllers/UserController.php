<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Traits\ImageUploader;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\PayloadFactory;
use Tymon\JWTAuth\JWTManager as JWT;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    use ImageUploader;
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'family_name'=>'required|string|max:255',
            'user_name'=>'required|string|max:255',
            'image'=>'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'=> 'required|string|email|max:255|unique:users',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' =>'min:6',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);        
        }
        
        $user = new User;
        $user->name = $request->name;
        $user->family_name = $request->family_name;
        $user->user_name = $request->user_name;
        $user->image = $request->image;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->confirm_password = bcrypt($request->confirm_password);

        $user->save();

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->json()->all();

        try {
            if(! $token = JWTAuth::attempt($credentials)){
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        }catch(JWTException $e){
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

        public function getAuthenticatedUser()
        {
          return auth('api')->user();               
        }
    }




