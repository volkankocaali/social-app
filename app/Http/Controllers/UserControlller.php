<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;

class UserControlller extends Controller
{
    public function show(User $user){
        return new UserResource($user);
    }
}
