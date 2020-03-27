@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-3">
            @include('inc.sidebar')
        </div>


        <div class="col-md-9">
            <div class="card">
                <div class="card-header">

                    <h2>Tickets</h2>
                </div>

                <div class="card-body">
                @if(count($tickets)>0)
                    @foreach($tickets as $ticket)
                        <div class="card">
                            <h5><a href="/tickets/{{$ticket->id}}"> {{$ticket->title}}</a></h5>
                            <small>Posted on {{$ticket->created_at}}&nbsp by &nbsp {{$ticket->user->name}} </small>
                        </div>
                        <br>
                    @endforeach
                    {{$tickets->links()}} <!--for pagination-->
                @else
                    <p>No Tickets Found!</p>
                @endif

                    
                </div>
            </div>
        </div>


        
    </div>

@endsection




