<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function getSignup()
    {
    	return view('user.signup');
    }

    public function postSignup(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'email|unique:users|required',
    		'password' => 'required|min:5'
    	]);
//    	$request->input('email') also works
    	$user = new User([
    		'email' => $request['email'],
    		'password' => bcrypt($request->input('password'))
    	]);

    	$user->save();
    	Auth::login($user);
    	if(Session::has('oldUrl')){
    			$oldUrl = Session::get('oldUrl');
    			Session::foreget('oldUrl');
    			return redirect()->route($oldUrl);
    		}
    		else{
	    		return redirect()->route('product.index');
    		}
    }

    public function getSignin()
    {
    	return view('user.signin');
    }

    public function postSignin(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'email|required',
    		'password' => 'required|min:5'
    	]);

    	$user = new User([
    		'email' => $request['email'],
    		'password' => bcrypt($request->input('password'))
    	]);
    	if(Auth::attempt(['email' => $request['email'],'password' => $request->input('password')]))
    	{
    		if(Session::has('oldUrl')){
    			$oldUrl = Session::get('oldUrl');
    			Session::forget('oldUrl');
    			return redirect()->route($oldUrl);
    		}
    		else{
	    		return redirect()->route('user.profile');
    		}
    	}
    	return redirect()->back();
    }

    public function getProfile()
    {
    	$order =Auth::user()->orders;
    	$orders->transform(function($order,$key){
    		$order->cart = unserialize($order->cart);
    		return $orders;
    	});
    	return view('user.profile',['orders'=>$orders]);
    }

    public function getLogout()
    {
    	Auth::logout();
    	Session::flush();
    	return redirect()->route('product.index');
    }
}
