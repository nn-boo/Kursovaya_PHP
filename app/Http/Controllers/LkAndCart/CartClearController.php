<?php

namespace App\Http\Controllers\LkAndCart;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketUser;
use Illuminate\Support\Facades\Auth;

class CartClearController extends Controller
{
    public function __invoke()
    {
        foreach (Ticket::all() as $ticket){
            $ticket = TicketUser::where('ticket_id', $ticket->id)->where('user_id', Auth::user()->getAuthIdentifier())->first();
            if (!is_null($ticket)){
                 $ticket->forceDelete();
            }
        }
        return redirect(route('tickets.cart'));
    }
}
