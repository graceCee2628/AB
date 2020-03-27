@extends('layouts.app')

@section('content')


    <div class="row justify-content-center">

        <div class="col-md-3">
            @include('inc.sidebar')
        </div>



        <div class="col-md-9">
            <div class="card">
                <div class="card-header">

                    <h2>Create A Ticket</h2>
                    

                </div>

                <div class="card-body">
                    {!! Form::open(['action'=> 'TicketsController@store', 'method' => 'POST']) !!}

                        <div class="form-group">
                            {{Form::label ('title', 'Title')}}
                            {{Form::select('title', ['Hardware' => 'Hardware', 'OS(Windows, Linux, Mac)' => 'OS(Windows, Linux, Mac)','Office'=>'Office','Suites'=>'Suites','Ms Office'=>'Ms Office'] ,$selected = null, ['class' => 'form-control'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label ('priority', 'Priority')}}
                            {{Form::select('priority', ['High' => 'High', 'Low' => 'Low','Urgent'=>'Urgent'],$selected = null, ['class' => 'form-control'] )}}
                        </div>
                        <div class="form-group">
                            {{Form::label ('description', 'Description')}}
                            {{Form::textarea('description','', ['class'=>'form-control', 'placeholder'=> 'Write the description of the incident.'] )}}
                        </div>
                        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}


                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection