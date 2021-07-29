<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Core\Services\TicketServices;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;

class TicketController extends Controller
{
    public function get_all_tickets($id)
    {
        try {
            $tickets = Tickets::where('user_id', $id)->get();
            return response()->json(['tickets' => $tickets], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'something is wrong'], 500);
        }
    }

    public function send_ticket(TicketServices $ticket, Request $request, $id)
    {
        try {
            $result = $ticket->answer_user($request,$id);
            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['err' => $e->getMessage()]);
        }
    }
}
