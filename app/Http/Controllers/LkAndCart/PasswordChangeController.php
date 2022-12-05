<?php

namespace App\Http\Controllers\LkAndCart;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketUser;
use Illuminate\Support\Facades\Auth;

class PasswordChangeController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate([
            'password' => 'string|min:8',
        ]);
        $user = Auth::user();
        $user->password = bcrypt($data['password']);
        $user->save();
        return redirect()->route('tickets.lk');
    }
}
