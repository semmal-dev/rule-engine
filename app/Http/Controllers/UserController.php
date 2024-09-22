<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public $successStatus = 200;
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function login()
    {
        try{
            if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
                $user = Auth::user();
                $data["success"] = true;
                $data['token'] =  $user->createToken('MyApp')->accessToken;
                return response()->json($data, $this->successStatus);
            } else {
                return response()->json(['error' => 'Unauthorised'], 401);
            }
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function register(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $checkUser = User::where('email', $input['email'])->first();
            if($checkUser){
                return response()->json(['error' => "User already exist with this email"], 409);   
            }
            $user = User::create($input);
            $data['message'] =  "User created successfully";
            $data['name'] =  $user->name;
            return response()->json($data, $this->successStatus);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
