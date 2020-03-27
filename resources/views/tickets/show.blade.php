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
					<a href="/tickets">Back</a>
					<br>
					<br>
					
					<h4>
						<b class="text-primary">
							{{$tickets->title}}
						</b>
					</h4>
					
					<div>
						{{$tickets->body}}
					</div>
					<hr>
					<small>Posted on {{$tickets->created_at}}</small>
					<hr>
					<a href="/tickets/{{$tickets->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
					<!--to delete-->
					<div class="delete" style="float: right">
				        {!! Form::open(['action'=> ['TicketsController@destroy', $tickets->id], 'method' => 'POST',]) !!}

				           	{{Form::hidden('_method', 'DELETE')}}<!--checked php artisan route:list, route request for update is PUT|PATCH; but we cannot just change the method to PUT or PATCH but we can do this intead..-->
				            {{Form::submit('Delete', ['class'=> 'btn btn-danger btn-sm'])}}

				        {!! Form::close() !!}
				    </div>  
                    
                </div>
            </div>
        </div>


        
    </div>
              
@endsection


