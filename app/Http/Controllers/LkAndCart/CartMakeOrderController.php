<?php

namespace App\Http\Controllers\LkAndCart;

use App\Http\Controllers\Controller;
use App\Mail\Ordering;
use App\Models\Ticket;
use App\Models\TicketUser;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CartMakeOrderController extends Controller
{
    public function __invoke()
    {
        $validator = Validator::make([],[]);
        $mailBody = array();
        foreach (Ticket::all() as $ticket) {
            $ticketU = TicketUser::where('ticket_id', $ticket->id)->where('user_id', Auth::user()->getAuthIdentifier())->first();

            if (is_null($ticketU ))
                continue;


            if ($ticket->quantity < $ticketU->count) {
                $validator->getMessageBag()->add('quantity', 'Кол-во билетов "' . $ticket->title . '",
                которые вы хотите заказать, больше, чем есть (' . $ticket->quantity . ' штук)');
                return redirect(route('tickets.cart'))->withErrors($validator);
            }
        }
        foreach (Ticket::all() as $ticket) {
            $ticketU = TicketUser::where('ticket_id', $ticket->id)->where('user_id', Auth::user()->getAuthIdentifier())->first();

            if (is_null($ticketU ))
                continue;

            $mailBody[$ticketU->id]['name'] = 'Наименование: ' . $ticket->title;
            $mailBody[$ticketU->id]['desc'] = 'Описание: ' . $ticket->description;
            $mailBody[$ticketU->id]['address'] = 'Адрес: ' . $ticket->place;
            $mailBody[$ticketU->id]['count'] = 'Кол-во: ' . $ticketU->count . ' штук';

            if ($ticket->quantity == $ticketU->count){
                $ticket->quantity = 0;
                $ticket->save();
                $ticket->delete();
            } else {
                $ticket->quantity -= $ticketU->count;
                $ticket->save();
            }

            $ticketU->delete();

        }
        Mail::to(Auth::user())->queue(new Ordering($mailBody));
        return redirect(route('tickets.cart'));
    }
}
