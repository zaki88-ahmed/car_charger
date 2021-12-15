<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\ContactInterface;
use App\Http\Interfaces\LastNewsInterface;
use App\Http\Interfaces\MessageInterface;
use App\Http\Interfaces\OurProjectsInterface;
use App\Http\Interfaces\RateInterface;
use App\Http\Traits\ApiDesignTrait;
use App\Models\Contact;
use App\Models\LastNew;
use App\Models\Message;
use App\Models\OurProject;
use App\Models\Rate;
use App\Models\User;

use App\Models\UserIp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Nullable;


class RateRepository implements RateInterface
{

    use ApiDesignTrait;

    private $rateModel;
    private $userIpModel;



    public function __construct(Rate $rateModel, UserIp $userIp)
    {
        $this->rateModel = $rateModel;
        $this->userIpModel = $userIp;
    }


    public function rateApp($request)
    {
        // TODO: Implement rateApp() method.

        $validation = Validator::make($request->all(),[
            'rate' => 'integer|between:1,5',
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validation->fails()){
            return $this->ApiResponse(422,'validation error',$validation->errors());
        }



        $user_id = $request->user_id;
        $userIp = $this->userIpModel::where('user_id', $request->user_id)->first();

//        $user = $this->rateModel::whereHas('RateIp', function ($q) use ($user_id) {
//            $q->where('user_id', $user_id);
//        })->get();

//        dd($user->ip);

        $data = $this->rateModel::create([
            'rate' => $request->rate,
            'user_ip' => $userIp->id,
        ]);

        $rates = $data->with('RateIp')->get();

        return $this->ApiResponse(200,'Done',null,$rates);
    }
}
