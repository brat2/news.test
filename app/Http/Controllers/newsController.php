<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\NewsRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    private $newsRepository;
    private $sities;

    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->newsRepository = $newsRepository;
        $this->sities = $newsRepository->getSities();
    }

    public function home()
    {
        $favorite = $this->newsRepository->getFavorite(auth()->user());
        return view('index', [
            'favorite' => $favorite,
            'sities' => $this->sities
        ]);
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
