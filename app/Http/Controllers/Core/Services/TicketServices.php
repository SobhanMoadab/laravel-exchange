<?php


namespace App\Http\Controllers\Core\Services;

use App\Models\Log;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TicketServices extends Controller
{
    public function store($request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'priority' => 'required',

        ], [
            'title.required' => ' title is required',
            'content.required' => 'content is required',
            'priority.required' => 'required',

        ]);
        try {
            $current_url = url()->current();

            // for admin
            $tickets = [];
            if (str_contains($current_url, 'dashboard')) {
                if (is_array($request->attachments)) {
                    foreach ($request->attachments as $attachment) {
                        $ticket = Tickets::create([
                            'title' => $request->title,
                            'admin_id' => Auth::id(),
                            'content' => $request->content,
                            'priority' => $request->priority,
                            'attachments' => $attachment,
                        ]);
                        array_push($tickets, $ticket);
                    }
                    Log::create(['action' => 'تیکت ساخته شد', 'user_id' => Auth::id(), 'is_admin' => true]);
                    return ['msg' => 'success', 'tickets' => $tickets, 'error' => null];
                } else {
                    $ticket = Tickets::create([
                        'title' => $request->title,
                        'admin_id' => Auth::id(),
                        'content' => $request->content,
                        'priority' => $request->priority,
                        'attachments' => $request->attachments,

                    ]);
                    Log::create(['action' => 'تیکت ساخته شد', 'user_id' => Auth::id(), 'is_admin' => true]);
                    return ['msg' => 'success', 'ticket' => $ticket, 'error' => null];
                }
            } else {
                // for user
                if (is_array($request->attachments)) {
                    foreach ($request->attachments as $attachment) {
                        $ticket = Tickets::create([
                            'title' => $request->title,
                            'email' => Auth::user()->email,
                            'user_id' => Auth::id(),
                            'content' => $request->content,
                            'priority' => $request->priority,
                            'attachments' => $attachment,
                            'status' => 0

                        ]);
                        array_push($tickets, $ticket);
                    }
                    Log::create(['action' => 'تیکت ساخته شد', 'user_id' => Auth::id(), 'is_admin' => true]);
                    return ['msg' => 'success', 'tickets' => $tickets, 'error' => null];
                } else {
                    $ticket = Tickets::create([
                        'title' => $request->title,
                        'user_id' => Auth::id(),
                        'email' => Auth::user()->email,
                        'content' => $request->content,
                        'priority' => $request->priority,
                        'attachments' => $request->attachments,
                        'status' => 0

                    ]);
                    Log::create(['action' => 'تیکت ساخته شد', 'user_id' => Auth::id(), 'is_admin' => true]);
                    return ['msg' => 'success', 'ticket' => $ticket, 'error' => null];
                }
            }
        } catch (\Exception $e) {
            return ['error', $e->getMessage()];
        }
    }
}
