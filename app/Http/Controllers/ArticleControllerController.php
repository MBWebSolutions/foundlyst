<?php

namespace App\Http\Controllers;

use App\Models\ArticleController;
use Illuminate\Http\Request;

class ArticleControllerController extends Controller
{
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
      return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleController  $articleController
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleController $articleController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleController  $articleController
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleController $articleController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticleController  $articleController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleController $articleController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleController  $articleController
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleController $articleController)
    {
        //
    }
}
