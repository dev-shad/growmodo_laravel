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
    public function unsubscribe($userId)
    {
        
        $user = User::find($userId)->delete();
        
        return response()->json([
            'status' => $user? true:false,
            'message' => $user? 'User Deleted Successfully':''
        ]);
    }
}
