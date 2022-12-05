<?php

namespace App\Http\Controllers\Reserve;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketUser;
use Illuminate\Support\Facades\Auth;

class AddTicketController extends Controller
{
    public function __invoke($id)
    {
        $userID = Auth::user()->getAuthIdentifier();
        $ticket = TicketUser::where('ticket_id', $id)->where('user_id', $userID)->first();
        if ($ticket == null){
            $ticket = new TicketUser();
            $ticket->ticket_id = $id;
            $ticket->user_id = $userID;
            $ticket->count = 1;
        }
        else {
            $ticket->count += 1;
        }
        $ticket->save();
        return redirect(route('tickets.reserve'));
    }
}
