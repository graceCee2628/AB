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
                           
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                               <a href="#" class="btn btn-primary btn-sm logs " id="acceptbtn">View Logs</a> 
                            </td>  
                        
                          </tr>
                          
                        </tbody>
                  </table>
  
                        

                </div>
                
            </div>

        </div>
        
    </div>


<script type="text/javascript">
    
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });    

           $('.logs').on('click', function(){
             
              alert('test');
    




            });
        });  

</script>    

@endsection