<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
       return view('index');
    }
}
