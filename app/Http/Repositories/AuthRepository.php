<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;
use App\Http\Traits\ApiDesignTrait;
use App\Models\User;

use App\Models\UserIp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthRepository implements AuthInterface
{

    use ApiDesignTrait;

    private $userModel;
    private $userIpModel;

    public function __construct(User $user, UserIp $userIp)
    {

        $this->userModel = $user;
        $this->userIpModel = $userIp;
    }





    /**
     * Create a new AuthController instance.
     *
     * @return void
     */


    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login($request)
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return $this->ApiResponse(422, 'unauthorized');
        }else{

            $ip = $request->ip();
            $userId = $this->userIpModel::where([['ip', $ip], ['user_id', auth()->user()->id]])->first();

            $this->userIpModel::create([
                'user_id' => auth()->user()->id,
                'ip' => $ip,
            ]);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
//    public function me()
//    {
//        return response()->json(auth()->user());
//    }
//
//    /**
//     * Log the user out (Invalidate the token).
//     *
//     * @return \Illuminate\Http\JsonResponse
//     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
//    public function refresh()
//    {
//        return $this->respondWithToken(auth()->refresh());
//    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {


        $userData = $this->userModel::find(auth()->user()->id);


        $data = [
            'name' =>$userData->name,
            'email' =>$userData->email,
            'phone' =>$userData->phone,

            'access_token' => $token,
        ];


        return $this->ApiResponse(200, 'done', null, $data);


//        return response()->json([
//            'access_token' => $token,
//            'token_type' => 'bearer',
//            'expires_in' => auth()->factory()->getTTL() * 60
//        ]);
    }





    public function addTestUser($request){


        $validation = Validator::make($request->all(),[
            'name' => 'required|min:3',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        if($validation->fails())
        {
            return $this->ApiResponse(422,'Validation Error', $validation->errors());
        }

        $this->userModel::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $this->ApiResponse(200,'User Created', null, $this->userModel);


    }



}
