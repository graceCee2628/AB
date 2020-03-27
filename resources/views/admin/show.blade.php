@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-3">
            @include('admin._sidebar')
        </div>


        <div class="col-md-9">
            <div class="card">
                <div class="card-header">

                    <h2>Treated Tickets</h2>
                </div>

                <div class="card-body">

                    {{ticket->status}}

                </div>
                
            </div>

        </div>
        
    </div>

@endsection
























<!--@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-3">
            @include('admin._sidebar')
        </div>


        <div class="col-md-9">
            <div class="card">
                <div class="card-header">

                    <h2>Open Ticket</h2>
                </div>

                <div class="card-body">
                    <a href="/admin">Back</a>
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
                    <a href="" class="btn btn-success btn-sm">Accept</a>
                </div>
                
            </div>

        </div>
        
    </div>

@endsection-->