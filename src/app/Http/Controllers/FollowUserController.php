<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FollowUser;
use Illuminate\Support\Facades\Auth;

class FollowUserController extends Controller
{
    public function follow(User $user) {
        $follow = FollowUser::create([
            'following_user_id' => Auth::user()->id,
            'followed_user_id' => $user->id,
        ]);

    }

    public function unfollow(User $user)
    {

    }
}
