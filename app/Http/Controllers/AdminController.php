<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth',['except' => ['create', 'store']]);
		
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = \App\Category::all();
	
		return view('admin.main', compact('categories'));
    }
	
	public function create()
    {
		return view('admin.create');
    }
	
	public function store()
    {
		$this->validate(request(), [
			'name' => 'required|min:2',
			'email' => 'required|min:10|email',
			'password' => 'required|min:6',
			'password_confirmation' => 'required|min:6',
		]);
		
		$user = new \App\User;
		$user->name = request('name');
		$user->email = request('email');
		$user->password = bcrypt(request('password'));
		
		$user->save();
		
		auth()->login($user);
		
		return redirect('/admin');
    }
}
