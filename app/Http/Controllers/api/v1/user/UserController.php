<?php


namespace App\Http\Controllers\api\v1\user;


use App\Http\Resources\UserResource as UserResource ;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController
{
    public function index(){
        return new UserResource(User::find(Auth::id()));
    }

    public function getUsers() {
        return UserResource::collection(User::all());
    }
}
