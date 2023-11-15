<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return response()->json($users);
    }

    public function show($user){
        $users = User::find($user);
        return response()->json($users);
    }
}
