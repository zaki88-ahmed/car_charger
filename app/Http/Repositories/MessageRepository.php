<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\MessageInterface;
use App\Http\Traits\ApiDesignTrait;
use App\Models\Message;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class MessageRepository implements MessageInterface
{

    use ApiDesignTrait;

    private $messageModel;



    public function __construct(Message $message)
    {
        $this->messageModel = $message;
    }


    public function userMessages()
    {
        // TODO: Implement userMessages() method.

        $data = $this->messageModel::get();

        return $this->ApiResponse(200, 'Done', null, $data);
    }

    public function SendMessage($request)
    {
        // TODO: Implement SendMessage() method.

        $validation = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:500',
            'body' => 'required|max:5000',
        ]);
        if ($validation->fails()){
            return $this->ApiResponse(422,'validation error',$validation->errors());
        }


        $this->messageModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'body' => $request->body,
        ]);

        return $this->ApiResponse(200, "Message Sent");
    }
}
