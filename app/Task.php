<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['status', 'content', 'user_id'];//createで使う準備

    public function user() //単数形にする
    {
        return $this->belongsTo(User::class); //Task のインスタンスが所属している唯一の User を取得できる
    }
}
