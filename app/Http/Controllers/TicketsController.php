<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Ticket;
use App\User;

class TicketsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth',['except'=> ['index', 'show']]);
        $this->middleware('auth');
    }

    public function index()
    {

        $user_id=Auth::user()->id;
        $user=User::find($user_id);
        return view ('home')->with('tickets', $user->tickets); 
    }

    
    public function create()
    {
        return view ('tickets.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'priority' => 'required',
            'description'=> 'required'
        ]);

        $ticket = new Ticket;
        $ticket->title =$request->input('title');
        $ticket->priority =$request->input('priority');
        $ticket->body =$request->input('description');
        $ticket->status ='open';
        $ticket->user_id =auth()->user()->id; 
        $ticket->save();

        return redirect('/tickets')->with('success', 'Tickets Created');

       /* $ticket = new Ticket;
        $ticket->title = 'PC';
        $ticket->priority ='High';
        $ticket->body ='I need heeeeelllp';
        $ticket->status ='open';
        $ticket->user_id =auth()->user()->id; 
        $ticket->save();

        return redirect('/tickets')->with('success', 'Tickets Created');*/
    }

   
    public function show($id)
    {
        $tickets = Ticket::find($id); 

        return view ('tickets.show')->with('tickets', $tickets);

    }

    
    public function edit($id)
    {
        $tickets = Ticket::find($id);

        if(auth()->user()->id !==$tickets->user_id){
            return redirect ('/tickets')->with('error', 'Unauthorized Page!');
        }
        
        return view ('tickets.edit')->with('tickets', $tickets);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'priority' => 'required',
            'description'=> 'required'
        ]);

        $ticket = Ticket::find($id);
        $ticket->title =$request->input('title');
        $ticket->priority =$request->input('priority');
        $ticket->body =$request->input('description');
        $ticket->status ='open';
        $ticket->user_id =auth()->user()->id; 
        $ticket->save();
        return redirect('/tickets')->with('success', 'Ticket Updated');
    }

    
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        if(auth()->user()->id !==$ticket->user_id){
            return redirect ('/tickets')->with('error', 'Unauthorized Page!');
        }        
        $ticket->delete();
        return redirect('/tickets')->with('success', 'Ticket Removed!');
    }
}
