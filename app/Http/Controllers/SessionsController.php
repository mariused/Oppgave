<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;

class SessionsController extends Controller
{
	public function __construct() 
	{
		$this->middleware('guest', ['except' => ['destroy', 'update', 'edit']]);
	}
	
    public function create() 
	{
		$categories = DB::table('categories')->get();
	
		return view('sessions.create', compact('categories'));
	}
	
	public function destroy() 
	{
		auth()->logout();
		
		return redirect('/');  
	}
	
	public function store() 
	{
		$this->validate(request(), [
			'email' => 'required|email',
			'password' => 'required'
		]);

		
		/*
		if (! \Auth::attempt(['email' => request('email'),'password' => $password])) {
			return back()->withErrors([
				'message' => 'Sjekk at informasjonen er skrevet riktig.' . $password
			]);
		} */
		
		 $credentials = array(
            'email' => request('email'),
            'password' => request('password')
        );
		
		
		
		if (! \Auth::attempt($credentials)) {
			return back()->withErrors([
				'message' => 'Sjekk at informasjonen er skrevet riktig.'
			]);
		}
		
		/*
		$user = \App\User::where('email', request('email'))
		->where('password', request('password'))
		->first();
		*/
	
		
		//\Auth::login($user);
		return redirect('/admin');
	}
	
	public function edit() 
	{
		
		return view('admin.change');  
	}
	
	public function update() 
	{
		$user = \Auth::user();
		
		$this->validate(request(), [
			'password' => 'required|min:6',
			'password_confirmation' => 'required|min:6'
		]);
		
        $user->password = bcrypt(request('password'));
	
		$user->save();
		
		return redirect('/admin'); 
	}
}
