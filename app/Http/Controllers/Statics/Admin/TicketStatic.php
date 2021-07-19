<?php


namespace App\Http\Controllers\Statics\Admin;

use App\Http\Controllers\Core\Services\TicketServices;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class TicketStatic extends Controller
{
    public function index()
    {
        // list of tickets based on status, -> only active (open ticket)
        // data = [] => all tickets
        
        return view('Admin.Ticket.index');
    }
    public function show($id)
    {
        // todo get ticket by id
        return view('Admin.Ticket.index');

    }
    public function store(TicketServices $ticket, Request $request)
    {
        $result = $ticket->store($request);
        if ($result['error']) {
            return redirect()->back()->with('error', $result['error']);
        }

        return redirect()->back()->with('success', 'تیکت با موفقیت ارسال شد');
    }
    public function create()
    {
    }
    public function edit($id)
    {
    }
    public function destroy($id)
    {
    }
}
