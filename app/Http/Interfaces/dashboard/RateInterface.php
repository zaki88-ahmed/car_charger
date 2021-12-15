<?php
namespace App\Http\Interfaces\dashboard;


interface RateInterface {


    public function allRates();
    public function createRate($request);
    public function storeRate($request);
    public function showRate($rate, $userIp);
    public function deleteRate($rate, $request);

}


