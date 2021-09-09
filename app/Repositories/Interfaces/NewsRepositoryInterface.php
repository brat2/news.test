<?php
namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface NewsRepositoryInterface
{
  public function getFavorite($auth);

  public function getAllNews($sity = null);

  public function getSities();

  public function getOneNews($id);

  public function getSearch(Request $req);

  public function setFavorite($auth, $news_id);
}
