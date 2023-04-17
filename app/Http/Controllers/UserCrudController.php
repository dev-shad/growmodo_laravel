<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserCrudController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function unsubscribe(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'userId' => 'required'
        ]);
        if($validator->fails()){
          return response()->json([
              'status' => false,
              'message' => 'Validator error',
              'errors' => $validator->errors()
          ]);
        }
        $user = User::find($request->userId)->delete();
        
        return response()->json([
            'status' => $user? true:false,
            'message' => $user? 'User Deleted Successfully':''
        ]);
    }
}
