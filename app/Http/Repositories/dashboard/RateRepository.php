<?php

namespace App\Http\Repositories\dashboard;


use App\Http\Interfaces\dashboard\RateInterface;
use App\Http\Traits\ApiDesignTrait;

use App\Models\Rate;


use App\Models\User;
use App\Models\UserIp;
use Illuminate\Support\Facades\Hash;


class RateRepository implements RateInterface
{

    use ApiDesignTrait;

    private $rateModel;
    private $userIpModel;
    private $userModel;

    public function __construct(Rate $rateModel, UserIp $userIp, User $user)
    {
        $this->rateModel = $rateModel;
        $this->userIpModel = $userIp;
        $this->userModel = $user;
    }





    public function allRates()
    {
        // TODO: Implement allRates() method.


        $data['rates'] = $this->rateModel->get();
        $data['user'] = $this->userIpModel->get();

//        dd($data);

        return view('admin.rate.index')->with($data);
    }


    public function createRate($request)
    {
        // TODO: Implement createContact() method.
        return view('admin.rate.create');

    }

    public function storeRate($request)
    {
        // TODO: Implement storeContact() method.
        $request->validate([
            'rate' => 'required',
        ]);
//        dd($request->ip());
        $ip = $request->ip();

        $user = $this->userModel->create([
            'name' => 'user',
            'password' => Hash::make("123456"),
        ]);

//        dd($user->id);
        $userIp = $this->userIpModel->create([
            'user_id' => $user->id,
            'ip' => $ip,
        ]);
//        dd($ip);
        $this->rateModel->create([
            'user_ip' => $userIp->id,
            'rate' => $request->rate,
        ]);


//        $request->session->flash('prev', "contact/$this->contactModel->id");

//        return redirect(url("dashboard/contacts/{$this->contactModel->id}"));
        return redirect(url("dashboard/rates"));

    }



    public function showRate($rate, $userIp)
    {
        // TODO: Implement showRate() method.
        $data['rates'] = $rate;
        $data['user'] = $userIp;


        return view('admin.rate.show')->with($data);

    }



    public function deleteRate($rate, $request)
    {
        // TODO: Implement delereRate() method.

        $rate->delete();
        $msg = 'row deleted successfully';

        $request->session()->flash('msg', $msg);
        return back();

    }
}







//    public function rateApp($request)
//    {
//        // TODO: Implement rateApp() method.
//
//        $validation = Validator::make($request->all(),[
//            'rate' => 'integer|between:1,5',
//            'user_id' => 'required|exists:users,id',
//        ]);
//        if ($validation->fails()){
//            return $this->ApiResponse(422,'validation error',$validation->errors());
//        }
//
//
//
//        $user_id = $request->user_id;
//        $userIp = $this->userIpModel::where('user_id', $request->user_id)->first();
//
////        $user = $this->rateModel::whereHas('RateIp', function ($q) use ($user_id) {
////            $q->where('user_id', $user_id);
////        })->get();
//
////        dd($user->ip);
//
//        $data = $this->rateModel::create([
//            'rate' => $request->rate,
//            'user_ip' => $userIp->id,
//        ]);
//
//        $rates = $data->with('RateIp')->get();
//
//        return $this->ApiResponse(200,'Done',null,$rates);
//    }

