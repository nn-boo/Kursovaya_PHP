<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;


class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.create');
    }
}
