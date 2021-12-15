<?php
namespace App\Http\Interfaces\dashboard;


interface LastNewsInterface {


    public function allNews();

    public function showLastNews($news);


    public function createNews($request);
    public function storeNews($request);


    public function editNews($news);
    public function updateLastNews($news, $request);

    public function deleteLastNews($news, $request);



}


