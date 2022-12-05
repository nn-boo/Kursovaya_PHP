<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;


class UserController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }
}
