<?php

namespace App\Http\Controllers\Reserve;

use App\Http\Controllers\Controller;
use App\Models\Ticket;

class ReserveController extends Controller
{
    public function __invoke()
    {
        $tickets = Ticket::all();
        return view('reserve', compact('tickets'));
    }
}
