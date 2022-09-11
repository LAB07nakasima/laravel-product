<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
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

    // ブログを取得 １対多
    public function userPosts()
    {
        // 外部キーを引数で渡す
        return $this->hasMany(Post::class);
    }

    // いいね機能
    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }

    // コメント
    public function comments()
    {
        return $this->hasMany(User::class);
    }

}
