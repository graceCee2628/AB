@extends('layouts.app')

@section('content')

	<h3>Tickets</h3>
	<br>

	@if(count($tickets)>0)
		@foreach($tickets as $ticket)
			<div class="card">
				<h5><a href="/tickets/{{$ticket->id}}"> {{$ticket->title}}</a></h5>

				<small>Posted on {{$ticket->created_at}}</small>
			</div>
			<br>
		@endforeach
		{{$tickets->links()}} <!--for pagination-->
	@else
		<p>No Tickets Found!</p>
	@endif


@endsection