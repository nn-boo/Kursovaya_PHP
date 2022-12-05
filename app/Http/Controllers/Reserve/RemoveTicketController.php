<?php

namespace App\Http\Controllers\Reserve;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketUser;
use Illuminate\Support\Facades\Auth;

class RemoveTicketController extends Controller
{
    public function __invoke($id)
    {
        $userID = Auth::user()->getAuthIdentifier();
        $ticket = TicketUser::where('ticket_id', $id)->where('user_id', $userID)->first();
        if ($ticket != null){
            if ($ticket->count == 1)
                $ticket->forceDelete();
            else{
                $ticket->count -= 1;
                $ticket->save();
            }
        }
        return redirect(route('tickets.reserve'));
    }
}
