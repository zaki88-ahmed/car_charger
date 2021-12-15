<?php

namespace App\Http\Controllers\dashboard;


use App\Http\Interfaces\dashboard\RateInterface;
use App\Models\Rate;
use App\Models\User;
use App\Models\UserIp;
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



    public function allRates(){

        return $this->rateInterface->allRates();
    }
    public function createRate(Request $request){
        return $this->rateInterface->createRate($request);
    }

    public function storeRate(Request $request){
        return $this->rateInterface->storeRate($request);
    }



    public function showRate(Rate $rate, UserIp $user)
    {
        return $this->rateInterface->showRate($rate, $user);
    }


    public function deleteRate(Rate $rate, Request $request)
    {
        return $this->rateInterface->deleteRate($rate, $request);
    }


}
