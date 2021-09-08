<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class newsController extends Controller
{
    public function home()
    {
        $news = News::with('sity')
        ->get();
        return view('index', ['data' => $news]);
    }

    public function index()
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
