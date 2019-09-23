<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Http\Resources\UserCollection;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function allUserMassageSent()
    {


        $msg = Message::selectRaw("count(*) as message,user_id,COUNT( NULLIF( visited, 0 ) ) as visited,MAX(created_at) as last_time")->groupBy("user_id")->get();
        return new UserCollection($msg);

    }

    public function homeChat()
    {
        return view('HomeView.index');

    }

    public function fetchMessages(User $user)
    {
        return $user->load("messages");
    }

    public function sendMessage()
    {
        $user=User::find(\request("user_id"));
        $newMessage=$user->messages()->create([
            "message" => \request("messageSend"),
            "visited"=>0,
            "user_id"=>request("user_id"),
            "admin"=>request("admin")
        ]);

        broadcast(new ChatEvent($user, $newMessage));

        return ['status' => 'Message Sent!'];
    }
}
