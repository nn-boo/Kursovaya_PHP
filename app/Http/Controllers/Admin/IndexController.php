<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;


class IndexController extends Controller
{
    public function __invoke()
    {
        $tickets = Ticket::all();
        return view('admin.ticket', compact('tickets'));
    }
}
