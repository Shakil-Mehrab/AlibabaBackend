<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users=User::get();
        return UserResource::collection($users);
    }
}