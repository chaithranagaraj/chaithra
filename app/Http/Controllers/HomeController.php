<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::where('created_by',Auth::user()->id)->paginate(3);
        return view('home',['tests'=>$tests]);
    }
}
