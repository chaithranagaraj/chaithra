@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard
                   
                                <button type="submit" class="btn btn-success" style="color:black;">
                                   <a href="{{ url('/test/create') }}">ADD</a> 
                                </button>
            
            </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- <table >
                   <tr>
                        <th>Name</th>
                        
                   

                  
                        <th>email</th>
                        
                   
                        <th>message</th>
                       
                    </tr>
                </table> -->


<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title"><center> Table</center></h3>
            </div>
                <div class="panel-body " >
                    <div class="col-sm-offset-9 col-sm-3">
                    <form class="form-search" method="GET" action="{{ url('/test/search') }}" autocomplete="off">
                        <div class="input-group">
                            <input class="form-control" id="search" placeholder="search" name="search" type="text">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Go</button>
                            </span>
                         </div>
                    </form>

                    </div>
                </div>
                <div >
                    <div class="form-group" ></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th class="hidden-xs">email</th>
                                
                                <th class="hidden-xs">message</th>
                                 <th class="hidden-xs">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tests as $test)
                               
                                 <tr>
                                    <td>{{ $test->test_id }}</td>
                                    <td>{{ $test->name }}
                                <ul class="table-mobile-ul visible-xs list-unstyled">
                                    <li>
                                        Test email: {{  $test->email }}
                                    </li>

                                </ul>
                                </td>
                                <td class="hidden-xs">{{ $test->email }}</td>
                                <td class="hidden-xs">{{ $test->message }}</td>
                                <td>
                                <div class="btn-group btn-group-xs">
                                 <a href="{{ url('test/view/' .$test->test_id) }}"
                                data-toggle="tooltip" data-placement="top" data-original-title="Edit" class="btn btn-success waves-effect">
                                <i class="fa fa-eye icon-only"></i>View</a>

                                <a href="{{ url('test/edit/' .$test->test_id) }}"
                                data-toggle="tooltip" data-placement="top" data-original-title="Edit" class="btn btn-primary waves-effect">
                                <i class="fa fa-edit icon-only"></i>Edit</a>

                                <button onclick="Delete('{{ $test->test_id }}')"
                                 data-toggle="tooltip" data-placement="top" data-original-title="Delete" class="btn btn-danger waves-effect hidden-xs">
                                <i class="fa fa-trash-o icon-only"></i>Delete
                                </button>
                                </div>
                                </td>

                                </tr>
                               @endforeach
                           
                               </tbody>
                            
                             </table>
                     </div>
                  </div>
                  <div class="row">
                    
                 </div>
            </div>     
      </div>
    </div>
</div>
</div>





                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
function Delete(test_id)
{
    if(confirm('do you want to continue..?'))
    {

    $.ajax({
        method: 'GET',
        url: "{{ route('test.delete') }}",
        data: {
            test_id: test_id

        },
        success: function(data)
        {
            window.location='{{ url("/home") }}';
        },
        error: function(data)
        {
            window.location='{{ url("/home") }}';
        }


    });
}
}



</script>
@endsection

