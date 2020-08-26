<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(User $users, Request $request)
    {
        $this->model = $users;
        $this->request = $request;
    }
}
