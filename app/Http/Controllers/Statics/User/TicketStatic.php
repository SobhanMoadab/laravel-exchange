<?php


namespace App\Http\Controllers\Statics\User;

use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class TicketStatic extends Controller
{
    public function index()
    {
        return view('User.Ticket.index');
    }
    public function show($id)
    {
        $data = ['ticket' => Tickets::findOrFail($id)];
        return view('User.Ticket.show', $data);
    }
}
