<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function fetchUsers()
    {
        return User::all();
    }

}
