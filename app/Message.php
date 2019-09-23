<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class Message extends Model
{
    protected $guarded=[];
    protected $appends=[
        "avatar",
        "name",
        "created"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAvatarAttribute()
    {
        return $this->user->avatar;
    }

    public function getNameAttribute()
    {
        return $this->user->name;
    }

    public function getCreatedAttribute()
    {
        return Jalalian::forge($this->created_at)->ago();
    }

}
