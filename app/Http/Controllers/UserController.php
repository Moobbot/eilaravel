<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show($id)
    {
        return User::findOrFail($id);
    }
    public function index()
    {
        return User::get();
    }
}
