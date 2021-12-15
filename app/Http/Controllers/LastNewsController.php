<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AboutInterface;
use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\ContactInterface;
use App\Http\Interfaces\LastNewsInterface;
use App\Http\Interfaces\MessageInterface;
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

    public function showLastNews(Request $request)
    {
        return $this->lastNewsInterface->showLastNews($request);
    }

    public function addLastNew(Request $request)
    {
        return $this->lastNewsInterface->addLastNew($request);
    }

    public function updateLastNews(Request $request)
    {
        return $this->lastNewsInterface->updateLastNews($request);
    }
    public function deleteLastNews(Request $request)
    {
        return $this->lastNewsInterface->deleteLastNews($request);
    }






}
