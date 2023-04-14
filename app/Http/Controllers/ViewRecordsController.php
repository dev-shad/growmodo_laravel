<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ViewRecordsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }
    
    /**
     * Show the application User Records.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
      if(Auth::user()->hasRole('admin')){
          return view('viewRecords');
        }
      return view('home');
    }
    
    /**
     * Show the application User List.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getList(){
      return DB::table('users')
              ->where('email','<>', 'admin_101@gmail.com')
              ->select('name')
              ->orderBy('id','desc')
              ->get();
    }
}
