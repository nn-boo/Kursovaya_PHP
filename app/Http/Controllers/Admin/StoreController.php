<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;


class StoreController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate([
            'title' => 'string',
            'description' => 'string',
            'place' => 'string',
            'cost' => 'integer',
            'quantity' => 'integer',
            'when' => 'date',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);
        $data['image'] = base64_encode($data['image']->get());
        Ticket::create($data);
        return redirect()->route('tickets.admin');
    }
}
