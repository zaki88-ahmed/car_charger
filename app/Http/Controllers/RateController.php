<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AboutInterface;
use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\ContactInterface;
use App\Http\Interfaces\LastNewsInterface;
use App\Http\Interfaces\MessageInterface;
use App\Http\Interfaces\OurProjectsInterface;
use App\Http\Interfaces\RateInterface;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class RateController extends Controller
{
    //
    private $rateInterface;



    public function __construct(RateInterface $rateInterface)
    {
        $this->rateInterface = $rateInterface;
    }



    public function rateApp(Request $request){

        return $this->rateInterface->rateApp($request);
    }



}
