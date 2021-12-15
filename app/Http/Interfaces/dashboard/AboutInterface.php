<?php
namespace App\Http\Interfaces\dashboard;


interface AboutInterface {


    public function editAbout($about);
    public function updateAbout($about, $request);


    public function getAbout();


}


