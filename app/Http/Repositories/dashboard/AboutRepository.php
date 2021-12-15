<?php

namespace App\Http\Repositories\dashboard;

use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\dashboard\AboutInterface;
use App\Http\Traits\ApiDesignTrait;
use App\Models\About;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class AboutRepository implements AboutInterface
{

    use ApiDesignTrait;

    private $aboutModel;

    public function __construct(About $aboutModel)
    {

        $this->aboutModel = $aboutModel;
    }


    public function updateAbout($about, $request)
    {
     // TODO: Implement updateAbout() method.


        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image',
        ]);


        $path = $about->image;


        if($request->hasfile('image')){
            Storage::delete($path);
            $path = Storage::put('Abouts', $request->file('image'));
        }

        $about->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
        ]);



        $data['about'] = $this->aboutModel->get();

        return view ('admin.abouts.index')->with($data);

    }





    public function editAbout($about)
    {
     // TODO: Implement editAbout() method.

        $data['about'] = $about;
        return view('admin.abouts.edit')->with($data);



    }





//    public function editAbout($aboutModel){
//
//        $data['about'] = $this->aboutModel::get();
//
//
//
//        return view('admin.contacts.edit')->with($data);
//
//    }



    public function getAbout()
    {
        // TODO: Implement getAbout() method.

        $data['about'] = $this->aboutModel::get();

        return view('admin.abouts.index')->with($data);
    }

}
