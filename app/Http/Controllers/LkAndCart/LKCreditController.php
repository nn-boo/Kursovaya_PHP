<?php

namespace App\Http\Controllers\LkAndCart;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketUser;
use Illuminate\Support\Facades\Auth;

class LKCreditController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate([
            'name' => 'string',
            'email' => 'email',
        ]);
        $user = Auth::user();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();
        return redirect()->route('tickets.lk');
    }
}
