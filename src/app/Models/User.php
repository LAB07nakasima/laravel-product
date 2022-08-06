<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;
    //use HasFactoryでHasFactoryクラスの関数を使用することを言ってる
    protected $table = 'users';

    //ホワイトリストを定義
    protected $fillable = [
        'name', 'email', 'password','age','gender','address', 'thanks_point'
    ];

    protected $hidden = [
        'password',
        // 'remember_token',
    ];
}
