<?php

namespace App\Repositories;

use App\Models\News;
use App\Repositories\Interfaces\NewsRepositoryInterface;
use Illuminate\Http\Request;

class NewsRepository implements NewsRepositoryInterface
{
    public function getFavorite($user){
        $favorite = News::with('sity')
        ->get();
        return $favorite;
    }

    public function getAllNews($sity = null){

    }
  
    public function getSities(){

    }
  
    public function getOneNews($id){

    }
  
    public function getSearch(Request $req){

    }
  
    public function setFavorite($user, $news_id){

    }
}
