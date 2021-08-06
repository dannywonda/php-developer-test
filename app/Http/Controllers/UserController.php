<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public function store(Request $request)
    {
        return UserService::store($request->api, $request->page);
    }
}
