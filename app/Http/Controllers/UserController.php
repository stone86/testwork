<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userList():JsonResponse
    {
        return ApiResponse::return(User::select('id', 'name')->get()->keyBy('id'));
    }
}
