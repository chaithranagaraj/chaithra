@extends('layouts.app')

@section('content')
<div class="content">
<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="pull-left page-title">view</h3>
        </div>
        </div>
        <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title">Entry</h3>
                </div>
                <div class="panel-body">
                   <div class="row">
                        <div class="col-md-2"></div>
                             <div class="col-md-8 col-sm-12 col-xs-12">
                                    <table class=" table table-bordered" style="text-align: center; padding:30px;">
                    <tr>
                        <th>Name</th>
                        <td> {{ $test->name }}</td>
                    </tr>

                   <tr>
                        <th>Usn</th>
                        <td> {{ $test->email }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td> {{ $test->message }}</td>
                    </tr>
                   <!--  <tr>
                        <th>Voter id</th>
                        <td> {{ $test->voter_id }}</td>
                    </tr> -->
                    
                    <div class="col-md-12"></div>
                                    </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection