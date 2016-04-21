<?php

namespace App\Http\Controllers;

use App\User;
use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use DB;
class adminController extends Controller
{
    //
    public function __construct()
    {
        if(!session()->get('user'))
        {
            return redirect('home');
        }
    }

    public function index()
    {
    	echo "index";
    }

    public function login($result = null)
    {
        if(session()->get('user'))
        {

        }
        else{
            return view('admin.adminLoginView', ['result' => $result]);
        }
    	
    }

    public function loginPost(Request $request)
    {   
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required',
            ]);
    	$email = $request->input('email');
    	$pass = $request->input('password');
    	
    	$user = DB::select('SELECT * FROM users WHERE email = :email AND password = :password',
                ['email'=>$email,'password'=>$pass]);

        
    	if($user)
    	{
            foreach ($user as $use) {
                session(['user'=>$use->username]);
                session(['image'=>$use->image]);
                session(['email'=>$use->email]);
            return redirect('home');
            }
            
    	}
    	else{
    		return redirect('admin/login/failed');
    	}
    }

    public function logout()
    {
        session()->flush();
        return redirect('admin/login');
    }

    public function signup()
    {
    	return view('admin.adminSignupView');
    }

    public function signupPost(Request $request)
    {
    	$user = new User;
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
            'password_confirm' => 'required|min:3|same:password',
            ]);
    	$user->firstname = $request->input('firstname');
    	$user->middlename = $request->input('middlename');
    	$user->lastname = $request->input('lastname');
    	$user->email = $request->input('email');
    	$user->password = $request->input('password');
    	if($user->save())
    	{
    		return redirect('admin/login/success');
    	}
    }

    
}
