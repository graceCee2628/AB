
@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-3">
            @include('inc.sidebar')
        </div>


        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>My Tickets</h2>
                </div>

                <div class="card-body">
                    @if(count($tickets)>0)
                    
                    <table class="table table-sm table-info table-striped">
                        <thead class="thead">
                          <tr>
                            <th> Title </th>
                            <th> Description </th>
                            <th> Priority </th>
                            <th> Status </th>
                            <th> Created </th>
                            <th> Action </th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach($tickets as $ticket)
                          <tr>
                            <td>{{ $ticket->title }}</td>
                            <td>{{ $ticket->body }}</td>
                            <td>{{ $ticket->priority }}</td>
                            <td>{{ $ticket->status }}</td>
                            <td>{{ $ticket->created_at }}</td>
                            <td>
                                <a href="/tickets/{{$ticket->id}}/edit" class="btn btn-primary btn-sm">Edit</a>

                            </td>  

                            <td>
                                {!! Form::open(['action'=> ['TicketsController@destroy', $ticket->id], 'method' => 'POST',]) !!}

                                    {{Form::hidden('_method', 'DELETE')}}<!--checked php artisan route:list, route request for update is PUT|PATCH; but we cannot just change the method to PUT or PATCH but we can do this intead..-->
                                    {{Form::submit('Delete', ['class'=> 'btn btn-danger btn-sm'])}}

                                {!! Form::close() !!}
                            </td>                             
                          </tr>
                           @endforeach
                        </tbody>
                  </table> 
                  @else 
                    <p align="center">You haven't submitted any tickets yet!</p>
                  @endif
                </div>
            </div>
        </div>
    </div>
@endsection



   




