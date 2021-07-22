<?php


namespace App\Http\Controllers\Statics\User;

use App\Http\Controllers\Core\Services\TicketServices;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TicketStatic extends Controller
{
    public function index()
    {
       $data = ['tickets' => Tickets::where('user_id', Auth::id())->get()]; 
        return view('User.Ticket.index', $data);
    }
    public function show($id)
    {
        $data = ['ticket' => Tickets::findOrFail($id)];
        return view('User.Ticket.show', $data);
    }
    public function create(){
        return view('User.Ticket.create');

    }
    public function store(TicketServices $ticket, Request $request)
    {
        $result = $ticket->store($request);
        if ($result['error']) {
            return redirect()->back()->with('error', $result['error']);
        }
        return redirect(route('user_tickets'));
    }
}
