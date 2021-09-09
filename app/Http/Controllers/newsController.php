<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\NewsRepositoryInterface;

class NewsController extends Controller
{
    private $newsRepository;
    private $cities;

    public function __construct(NewsRepositoryInterface $newsRepository)
    {
        $this->newsRepository = $newsRepository;
        $this->cities = $newsRepository->getCities();
    }

    public function home()
    {
        $favorite = $this->newsRepository->getFavorite(auth()->user());
        return view('home', [
            'news' => $favorite,
            'cities' => $this->cities
        ]);
    }

    public function allNews($city = null)
    {
        $news = $this->newsRepository->getСityNewsOrAll($city);
        $other = $this->newsRepository->getOtherNews($city);
        $activeCity = $this->cities->where('slug', $city)->first();
        return view('index', [
            'news' => $news,
            'other' => $other,
            'cities' => $this->cities,
            'city' => $activeCity
        ]);
    }

    public function show($id)
    {
        $news = $this->newsRepository->getOneNews($id);
        $similar = $this->newsRepository->getSimilarNews($id);

        return view('show', [
            'news' => $news,
            'similar' => $similar,
            'cities' => $this->cities
        ]);
    }

    public function search(Request $req)
    {
        return view('search');
    }

    public function setFavorite($news_id)
    {
        $this->newsRepository->setFavorite(auth()->user(), $news_id);
        return back();
    }
}
