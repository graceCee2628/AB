<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ticket;
use App\User;
use App\Comment;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /*TO LOAD THE ADMIN DASH BOARD*/

    public function index()
    {
        $tickets = Ticket::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.index')->with('tickets', $tickets);
    }

    public function tickets(Request $request, $id)
    {
        
        $ticket = Ticket::find($id);
        $ticket->status =$request->input('status');
        $ticket->user_id =auth()->user()->id; 
        $ticket->save();

        $comment = new comment;
        $comment->comments =$request->comment; 
        $comment->ticket_id = $id;
        $comment->user_id =auth()->user()->id; 
        $comment->save();

        return $id ;
       
    }

   /* public function show()
    {
      
        $tickets = Ticket::join('tickets','tickets.id','=','comments', 'comments.ticket_id')
                ->selectRaw('tickets.id',


                            ), 

        ->get();
        return response ($tickets);

        //return view('admin.treated_tickets');
       
    } */   


}
