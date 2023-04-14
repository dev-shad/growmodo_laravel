<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use Auth;


class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validator->fails()){
          return response()->json([
              'status' => false,
              'message' => 'Validator error',
              'errors' => $validator->errors()
          ]);
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
          $user = User::where('email', $request->email)->first();
          return response()->json([
              'status' => true,
              'message' => 'User Logged In Success',
              'token' => $user->createToken(Str::random(30))->plainTextToken
          ]);
        }
        return response()->json([
              'status' => false,
              'message' => 'Email and Password does not match with our record',
              'token' => ''
          ]);
        
        
    }
    
    
}
