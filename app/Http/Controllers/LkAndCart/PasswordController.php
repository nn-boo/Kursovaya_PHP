<?php

namespace App\Http\Controllers\LkAndCart;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketUser;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function __invoke()
    {
        return view('lkpass');
    }
}
