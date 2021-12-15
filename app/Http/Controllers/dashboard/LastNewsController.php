<?php

namespace App\Http\Controllers\dashboard;


use App\Http\Interfaces\dashboard\LastNewsInterface;
use App\Http\Interfaces\MessageInterface;
use App\Models\LastNew;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LastNewsController extends Controller
{
    //
    private $lastNewsInterface;



    public function __construct(LastNewsInterface $lastNewsInterface)
    {
        $this->lastNewsInterface = $lastNewsInterface;
    }



    public function allNews()
    {
        return $this->lastNewsInterface->allNews();
    }




    public function showLastNews(LastNew $news)
    {
        return $this->lastNewsInterface->showLastNews($news);
    }




    public function createNews(Request $request)
    {
        return $this->lastNewsInterface->createNews($request);
    }



    public function storeNews(Request $request)
    {
        return $this->lastNewsInterface->storeNews($request);
    }



    public function editNews(LastNew $news)
    {
//        dd($news);
        return $this->lastNewsInterface->editNews($news);
    }




    public function updateLastNews(LastNew $news, Request $request)
    {
        return $this->lastNewsInterface->updateLastNews($news, $request);
    }




    public function deleteLastNews(LastNew $news, Request $request)
    {
        return $this->lastNewsInterface->deleteLastNews($news, $request);
    }






}
