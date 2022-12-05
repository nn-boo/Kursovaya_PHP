<?php

namespace App\Http\Controllers\LkAndCart;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketUser;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __invoke()
    {
        $not_empty_count = 0;
        $summary = 0;
        foreach (Ticket::all() as $ticket){
            if (!is_null(TicketUser::where('ticket_id', $ticket->id)->where('user_id', Auth::user()->getAuthIdentifier())->first())){
                $not_empty_count += 1;
                $summary += (int) TicketUser::where('ticket_id', $ticket->id)->where('user_id', Auth::user()->getAuthIdentifier())->first('count')['count'] * $ticket->cost;
            }

        }
        $tickets = Ticket::all();
        return view('cart', compact('tickets', 'summary', 'not_empty_count'));
    }
}
