<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Test;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
    	$tests = Test::paginate(5);
    	return view('test.create',compact('tests'));
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    			'name' =>'required|max:50',
                'email' =>'required|max:50',
    			'message' =>'required|max:50',
    			
    		]);

    	Test::create([
    		'name' =>$request['name'],
            'email' =>$request['email'],
    		'message' =>$request['message'],
    		'created_by' =>Auth::User()->user_id,
    		]);
    	return redirect('/test/create');
    }
    public function edit(Test $test){
        $tests = Test::paginate(5);
        return view('test.edit',compact('tests','test'));
    }
    public function update(Request $request,Test $test){
        $this->validate($request,[
            'name' =>'required|max:50',
            'email' =>'required|max:50',
                'message' =>'required|max:50',
               
                


            ]);
            Test::where('test_id',$test->test_id)->update([
            'name' =>$request['name'],
            'email' =>$request['email'],
            'message' =>$request['message'],
           
            'created_by' =>Auth::User()->user_id,

            ]);
            return redirect('/test/create');
    }
    public function delete(Request $request){
                Test::where('test_id',$request->test_id)->delete();
    }


    public function view(Test $test){
        $tests = Test::paginate(5);
        return view('test.view',compact('tests','test'));
    }
   public function search(Request $request)//ENTERED SEARCH
    {
        $this->validate($request, [
            'search' => 'required'
        ]);


        $tests = Test::
              where('test_id', 'like', "%$request->search%")
            ->orWhere('name', 'like', "%$request->search%")
            ->orWhere('email', 'like', "%$request->search%")
            ->orWhere('message', 'like', "%$request->search%")
            ->paginate(5)
            ->appends(['search' => $request->search]);
        return view('home',compact('tests','email'));
    }
}
