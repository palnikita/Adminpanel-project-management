<?php
namespace App\Http\Controllers;

use App\Models\feedback;
use App\Models\Teams;
use App\Models\Ticket;
use App\Models\Team;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create()
    {
        $teams = Teams::all();
        return view('tickets.create_ticket', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'assign_to' => 'required|string',   
            'email' => 'required|email',
            'phone' => 'required|string',
            'project' => 'required|string',
            'subject' => 'required|string',
            'priority' => 'required|in:Low,High,Average',
            'attachment' => 'nullable|file|mimes:jpg,png,pdf,doc,docx',
            'message' => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }
        $data['status'] = 'Pending';


        Ticket::create($data);

        return redirect()->back()->with('success', 'Ticket created successfully.');
    }




    public function showall()
    {
        $tickets = Ticket::all();
        return view('tickets.showall', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);

        $feedbacks = feedback::where('ticket_id', $id)->get(); // Fetch feedback for the ticket
        return view('tickets.show', compact('ticket', 'feedbacks'));
       }

    public function updateStatus(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
    
        // Validate the status
        $request->validate([
            'status' => 'required|in:Pending,In Progress,Closeticket',
        ]);
    
        $ticket->status = $request->input('status');
        $ticket->save();
    
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }
    
        return redirect()->route('tickets.showall')->with('success', 'Status updated successfully.');
    }
      
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('showallticket')->with('success', 'Ticket deleted successfully.');
    }
    


    public function storeFeedback(Request $request, $ticketId)
    {
        $request->validate([
            'feedback' => 'required|string',
        ]);

        Feedback::create([
            'ticket_id' => $ticketId,
            'feedback' => $request->input('feedback'),
        ]);

        return redirect()->route('show', $ticketId)->with('success', 'Feedback posted successfully.');
    }










    

    
}
