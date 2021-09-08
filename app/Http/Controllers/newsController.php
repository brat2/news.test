<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newsController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function home()
    {
        return view('index');
    }
    public function show($id)
    {
        return view('show');
    }
    public function search(Request $req)
    {
        return view('search');
    }
    public function addFavorite($news_id)
    {
        return view('index');
    }
}
