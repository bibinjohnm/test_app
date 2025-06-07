<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Members;

class PostController extends Controller
{
    //
    public function signup()
    {
        return view('validate.signup');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
        'name'=>'required',
            'phoneno'=>'required|numeric',
            'password'=>'required',
            'dob'=>'required',
            'age'=>'required',
    ]);

        Members::create($validated);
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function login(){
        return view('validate.login');
    }

    public function logincheck(Request $request){
            $request->validate([
            'name'=>'required',
            'password'=>'required'
            ]);

            $member=DB::table('members')
            ->where('name',$request->name)
            ->where('password',$request->password)
            ->first();

            if($member){
                return redirect()->route('products.index');
            }else{
                return redirect()->back()->with('status','data not available');
            }
    }

   
}
