<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AboutInterface;
use App\Http\Interfaces\AuthInterface;
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


    public function updateAbout($request)
    {


        // TODO: Implement updateAbout() method.


        $validation = Validator::make($request->all(), [

            'image' => 'nullable|image',
            'title' => 'required',
            'body' => 'required|max:2000',
            'about_id' => 'required|exists:abouts,id',
        ]);



        if ($validation->fails()){
            return $this->ApiResponse(422,'validation error',$validation->errors());
        }

        $about = $this->aboutModel->find($request->about_id)->first();

        $path = $about->image;

        if($request->has('image')){

            Storage::delete($path);
            $path = Storage::putFile('about', $request->file('image'));

        }

        $about->update([

            'image' => $path,
            'title' => $request->title,
            'body' => $request->body,

        ]);

        return $this->ApiResponse(200, 'Updated Successfully', null, $about);
    }



    public function getAbout()
    {
        // TODO: Implement getAbout() method.

        $data = $this->aboutModel::get();

        return $this->ApiResponse(200, 'done', null, $data);
    }
}
