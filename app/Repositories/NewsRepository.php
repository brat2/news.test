<?php

namespace App\Repositories;

use App\Models\City;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\NewsRepositoryInterface;

class NewsRepository implements NewsRepositoryInterface
{
    private $allNews;

    //сделано
    public function getFavorite($user)
    {
        if (!$user) return [];
        $favorite = News::join('news_user', 'news_user.news_id', 'news.id')
            ->where('news_user.user_id', $user->id)
            ->orderBy('news.created_at', 'desc')
            ->select(['news.id', 'title', 'description'])
            ->get();
        return $favorite;
    }

    //сделано
    public function getСityNewsOrAll($city)
    {
        $news = $this->allNews ?? $this->getAllNews();
        if ($city) $news = $news->where('slug', $city);

        return $news;
    }

    //сделано
    public function getOtherNews($city)
    {
        if (!$city) return [];
        $other = $this->allNews ?? $this->getAllNews();
        $other = $other->where('slug', '<>', $city);

        return $other;
    }

    //сделано
    public function getCities()
    {
        $cities = City::all();
        return $cities;
    }

    //сделано
    public function getOneNews($id)
    {
        $news = News::select('id', 'title', 'img', 'description', 'text')
            ->where('id', $id)
            ->first();
        return $news;
    }

    public function getSimilarNews($id)
    {
    }


    public function getSearch(Request $req)
    {
    }

    public function addFavorite($user, $news_id)
    {
        User::find($user->id)->news()->attach($news_id);
    }


    public function removeFavorite($user, $news_id)
    {
        User::find($user->id)->news()->detach($news_id);
    }

    //сделано
    private function getAllNews()
    {
        $allNews = News::join('cities', 'cities.id', 'city_id')
            ->with('users')
            ->orderBy('news.created_at', 'desc')
            ->select(['news.id', 'title', 'description', 'slug'])
            ->get();
        $this->allNews = $allNews;
        return $allNews;
    }
}
