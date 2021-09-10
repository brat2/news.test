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
        return view('news.home', [
            'news' => $favorite,
            'cities' => $this->cities
        ]);
    }

    public function allNews($city = null)
    {
        $news = $this->newsRepository->getСityNewsOrAll($city);
        $other = $this->newsRepository->getOtherNews($city);
        $activeCity = $this->cities->where('slug', $city)->first();
        return view('news.index', [
            'news' => $news,
            'other' => $other,
            'cities' => $this->cities,
            'city' => $activeCity
        ]);
    }

    public function show($id)
    {
        $news = $this->newsRepository->getOneNews($id);
        $similar = $this->newsRepository->getSimilarNews($news);

        return view('news.show', [
            'news' => $news,
            'similar' => $similar,
            'cities' => $this->cities
        ]);
    }

    public function search(Request $req)
    {
        $news = $this->newsRepository->getSearch($req);
        return view('news.search', [
            'news' => $news,
            'cities' => $this->cities
        ]);
    }

    public function setFavorite($act, $news_id)
    {
        if ($act == 'add')
            $this->newsRepository->addFavorite(auth()->user(), $news_id);

        if ($act == 'remove')
            $this->newsRepository->removeFavorite(auth()->user(), $news_id);

        return $act;
    }
}
