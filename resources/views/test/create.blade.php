@extends('layouts.app')

@section('content')

<script type="text/javascript">
  function Validate(){
   
    var email=document.myform.email.value;
    var name=document.myform.name.value;
       var atpos=email.indexOf("@");
       var dotpos=email.lastIndexOf(".");

       if (atpos < 1 || ( dotpos - atpos < 2 )){
      document.getElementById('aa').innerText="*Enter a valid email";
      myform.email.focus();
      return false;
    }
    else{
        return true;
      }
      
    if (name == "" || name=="null") {
       
        document.getElementById('bb').innerText="*This field should not be null";
        myform.name.focus();
        return false;
    }
     else if(isNaN(name)){
          document.getElementById('cc').innerText="Enter only characters";
          return false;
        }
     else {
        return true;
      }
}      
</script>

<div class="container"  >
    <div class="row" >
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-default" >
                <div class="panel-heading" >Fill the data</div>

                <div class="panel-body">
                    <form class="form-horizontal" name="myform" method="POST" action="{{ url('/test/store') }}" onsubmit="return Validate()" enctype="multipart/form-data"  >
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>


                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                <span id="aa"></span>
                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">message</label>

                            <div class="col-md-6">
                                <textarea id="message" type="text" class="form-control" name="message" value="{{ old('message') }}" placeholder="message....." required></textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    SAVE
                                </button>
                               <!--  <button type="submit" class="btn btn-primary">
                                    REPORT
                                </button> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


