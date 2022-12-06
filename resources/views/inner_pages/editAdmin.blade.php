<!DOCTYPE html>
<html>

<head>
    <title>Edit Admins</title>
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity=
"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href=
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
   <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">

</head>

<body>

  <nav>
        <div class="logo">
            <img class="navLogo" src="{{ URL::asset('img/logo.png') }}" alt="logo">
        </div>
        <div class="toggle">
            <a href="#"></a>
        </div>
        <ul class="menu">
        <li> <a class="btn btn-light" href="{{ url('/admins') }}" role="button" style="background: #0e1a35; color: #fff;">Back</a></li>
            <li> <a class="btn btn-light" href="{{ url('/') }}" role="button" style="background: #0e1a35; color: #fff;">Logout</a></li>
            
        </ul>
    </nav>



<section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5" style="font-family: aristotelica display trial;text-decoration:none;">Add Admin</h2>

              <form method="POST" action="{{route('admin.update')}}">
                @csrf
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example1cg">Name</label>
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" value="{{$adminDetail['name'] }}" disabled>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3cg">Email</label>
                  <input type="email" id="form3Example3cg" class="form-control form-control-lg" value="{{$adminDetail['email'] }}" disabled>
                </div>

                
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cdg">Phone Number</label>
                  <input type="tel" id="phone" class="form-control form-control-lg" value="{{$adminDetail['phone'] }}" disabled>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cdg">Admin Id</label>
                  <input type="tel" id="phone" class="form-control form-control-lg" name="adminID" value="{{$adminID}}" readonly="readonly">
                </div>

                
                <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="statusDD">
                            @php
                            {{
                                if($adminDetail['status'] == 1){
                            @endphp            
                                    <option value=1 selected disabled>Active</option>
                                    <option value=0>In-Active</option>
                            @php               
                                }
                                else{
                            @endphp            
                                    <option value=1>Active</option>
                                    <option value=0 selected disabled>In-Active</option>  
                            @php
                                }
                            }}
                            @endphp
      			        </select>

                </div>
                <div class="btn-block">
                <input type="submit" value="Submit" class="btn btn-dark btn-block text-white" style="background-color: #0e1a35; margin-top: 10px"></input>
        
                </div>
                

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- <script type="js/addadmin.js"></script> -->
    </body></html>