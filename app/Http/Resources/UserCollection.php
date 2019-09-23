<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Morilog\Jalali\Jalalian;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $myArray=[];
        foreach ($this->collection as $item) {
            $user=User::find($item->user_id);
            $myArray[]= [
                "message_count"=>$item->message,
                "user_id"=>$item->user_id,
                "name"=>$user->name,
                "avatar"=>$user->avatar,
                "visit_count"=>$item->visited,
                "last_time"=>Jalalian::forge($item->last_time)->ago(),
            ];
        }

        return $myArray;
    }
}
