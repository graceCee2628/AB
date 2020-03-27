@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-3">
            @include('admin._sidebar')
        </div>


        <div class="col-md-9">
            <div class="card">
                <div class="card-header">

                    <h2>Open Tickets</h2>
                </div>

                <div class="card-body">
                    @if(count($tickets)>0)
                    
                    <table class="table table-sm table-info table-striped">
                        <thead class="thead">
                          <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach($tickets as $ticket)
                          <tr>
                            <td>{{$ticket->id}}</td>
                            <td>{{$ticket->title}}</td>
                            <td>{{$ticket->body}}</td>
                            <td>{{$ticket->priority}}</td>
                            <td>{{$ticket->status}}</td>
                            <td>{{$ticket->created_at}}</td>
                            <td>
                               <a href="#" class="btn btn-primary btn-sm btnaccept " id="acceptbtn">Accept</a> 

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


<!--------------------------------------------------------------------------
                     EDIT MODAL WHEN TICKET IS ACCEPTED
---------------------------------------------------------------------------->




        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
              
                    <!-- Modal Header -->
                    <div class="modal-header" >
                        <h4 class="modal-title" >
                            <label class="text-primary">Ticket ID:</label>
                            <label class="text-primary" id="id"></label>
                            
                        </h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">

                    <form id="UpdateForm">

                        {{ csrf_field() }}
                    <!--    {{ method_field('PUT') }} -->

                       <div class="form-group">
                            <label name="title">Title</label>
                            <label class='form-control' id="title"></label>

                            
                        </div>

                       <div class="form-group">
                            <label name="priority">Priority</label>
                            <label class='form-control' id="priority"></label>
                        </div>                       

                       <div class="form-group">
                            <label name="status">Status</label>
                            <select class='form-control' id="status">
                                <option>Open</option>
                                <option>Resolved</option>
                                <option>Pending</option>
                                <option>Returned</option>
                            </select> 
                            
                        </div> 


                       <div class="form-group">
                            <label name="description">Description</label>
                            <textarea class="form-control" id="description"></textarea>
                        </div>                    

                      <div class="form-group">
                            <label name="comment">Comments</label>
                            <textarea name="comment" class="form-control" id="comment" placeholder="Add your comments here..."></textarea>
                            
                        </div>

                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <!--   {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}-->
                        <button type="submit" class="btn btn-primary" class="submit">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    
                    </form>
              </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">

        /*
        |--------------------------------------------------------------------------
        | TO FETCH THE DATA FROM THE TABLE TO THE MODAL
        |--------------------------------------------------------------------------
        */        
        
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });    

           $('.btnaccept').on('click', function(){
              $('#myModal').modal('show');

              $tr = $(this).closest('tr');
              var data = $tr.children('td').map(function(){
                return $(this).text();
              }).get();

              console.log(data);


              $('#id').text(data[0]);
              $('#title').text(data[1]);              
              $('#description').text(data[2]);  
              $('#priority').text(data[3]);
              $('#status').val(data[4]);


           });

        /*
        |--------------------------------------------------------------------------
        | TO UPDATE THE DATA FROM THE TABLE TO THE MODAL
        |--------------------------------------------------------------------------
        */ 
        
           $('#UpdateForm').on('submit', function(e){
              e.preventDefault();
              var id = $('#id').text();
              var title = $('#title').text();
              var description =  $('#description').text();
              var priority = $('#priority').text();
              var status = $('#status').val();
              var comment = $('#comment').val();
              console.log(comment);

               $.ajax({
                      url:'/admin/'+id+'/tickets',
                      method:'POST',
                      data:{
                          id,
                          title,
                          description,
                          priority,
                          status,
                          comment

                      },
                      success:function(response){
                        console.log(response);
                        window.location.assign('/admin/' + response + '/treated_tickets');

                      },
                      error:function(error){
                        console.log(error); 
                      }
               });


           });

        /*
        |--------------------------------------------------------------------------
        | TO UPDATE THE DATA SYNTAX
        |--------------------------------------------------------------------------
        */ 

        });


    </script>

@endsection
