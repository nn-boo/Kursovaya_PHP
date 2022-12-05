<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __invoke()
    {
       return view('contacts');
    }
}
