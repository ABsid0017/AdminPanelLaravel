<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('js/main.js') }}"> -->

  
    <title>Home</title>

    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
  </head>
  
 <body>
  


<div class="section">

 <div class="container">
  <div class="form"> 
    <div class="left-side">

     <div> <span class="brand">
      <small>ADMIN PANEL</small></span> 
      
      <div id="err" style="color: red">
        @if(session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
      </div>

      <form style="width: 250px;" method="POST" action="{{route('validate.login')}}">
      @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        
        <div class="btn-block">
          <input type="submit" value="Submit" class="btn btn-primary btn-block text-white">
        </div>

      </form>
        </div> 
      </div>
       <div class="right-side"> 
        <img src="{{ URL::asset('img/logo.png') }}" width="200px">
      </div> </div> </div>
</div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>