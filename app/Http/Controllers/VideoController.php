<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VideoController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth',['except' => ['index', 'show']]);
		
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = \App\Article::paginate(9);
	
		return view('welcome', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = DB::table('categories')->get();
		$categories = \App\Category::all();
		
		return view('video.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //dd(request()->all());
		
		$this->validate(request(), [
			'title' => 'required|min:10',
			'description' => 'required|min:10',
			'url' => 'required|min:10',
		]);
		
		$article = new \App\Article;
		
		$article->title = strtoupper(request('title'));
		$article->description = request('description');
		$article->url = request('url');
		$article->date = date("Y-m-d");
		$article->emphasise = request('emphasise');
		$article->category = request('category');
	
		$article->save();
		
		return redirect('/video/' . $article->id); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = \App\Article::find($id);
		$categories = DB::table('categories')->get();
	
		return view('video.show', compact('article'), compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$article = \App\Article::find($id);
		$categories = \App\Category::all();
        return view('video.edit', compact('article'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
		$this->validate(request(), [
			'title' => 'required|min:10',
			'description' => 'required|min:10',
			'url' => 'required|min:10',
			'date' => 'required|min:10|max:10',
		]);
		
        $article = \App\Article::find($id);
		$article->title = strtoupper(request('title'));
		$article->description = request('description');
		$article->url = request('url');
		$article->date = request('date');
		$article->emphasise = request('emphasise');
		$article->category = request('category');
		

		$article->save();
		
		return redirect('/video/' . $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = \App\Article::find($id);
		$article->delete();
		
		return redirect('/');
    }
}
