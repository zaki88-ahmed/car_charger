<?php
namespace App\Http\Interfaces;


interface LastNewsInterface {


    public function allNews();

    public function showLastNews($request);

    public function updateLastNews($request);

    public function deleteLastNews($request);

    public function addLastNew($request);



}


