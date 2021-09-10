<?php
namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface NewsRepositoryInterface
{
  public function getFavorite($user);

  public function getСityNewsOrAll($city);

  public function getOtherNews($city);

  public function getCities();

  public function getOneNews($id);

  public function getSimilarNews($id);

  public function getSearch(Request $req);

  public function addFavorite($user, $news_id);
  public function removeFavorite($user, $news_id);
}
