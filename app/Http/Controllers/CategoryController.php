<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth',['except' => 'index']);
		
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
			'category' => 'required|min:3',
			'tag' => 'required|min:3',
		]);
		
		$category = new \App\Category;
		
		$category->category = request('category');
		$category->tag = request('tag');
		
		$category->save();
		//dd($article);
		return redirect('/admin'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		//$cat = DB::table('categories')->where('category', request('category'))->first();
		//$cat = request('category');
		
		$category = \App\Category::find($id);
		
        return view('kategori.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $category = \App\Category::find($id);
		$category->category = request('category');
		$category->tag = request('tag');
		

		$category->save();
		/*
		\App\Category::update($id, array(
			'category'=>request('category'),
			'tag'=>request('tag'),
		));  */
		/*
		DB::table('categories')
            ->where('id', $id)
            ->update(array('category' => request('category'))); */
		
		return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = \App\Category::find($id);
		$category->delete();
		
		return redirect('/admin');
    }
}
