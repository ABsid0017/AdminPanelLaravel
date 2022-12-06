<!DOCTYPE html>
<html>

<head>
    <title>Add Policies</title>
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
        <li> <a class="btn btn-light" href="{{ url('/policies') }}" role="button" style="background: #0e1a35; color: #fff;">Back</a></li>
            <li> <a class="btn btn-light" href="{{ url('/') }}" role="button" style="background: #0e1a35; color: #fff;">Logout</a></li>
            
        </ul>
    </nav>





<section class="vh-100 md-4 " >
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
            <H2><center>Policies</center></H2>
            <form method="POST" action="{{route('policy.add')}}">
                @csrf
                <div class="form-outline mb-1">
                                <div class="form-group">
                                        <label for="policyFor">Select Policy For</label>
                                        <select class="form-control"  name="policyFor" required>
                                                <option value="Buyer" >Buyer</option>
                                                <option value="Seller">Seller</option>
                                        </select>
                                </div>
                        </div>


                <div class="form-outline mb-1">
                        <label class="form-label" for="title">Title</label>
                        <input type="text"  class="form-control" name="title" required>
                </div>
                <div class="form-group form-outline mb-1">
              <label for="description">Descrption</label>
              <textarea class="form-control"  rows="5" name="description" required ></textarea>
              </div>
   
               
                <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" required>
                                <option value=1 selected>Active</option>
                                <option value=0>In-Active</option>
                        </select>
                </div>


                <div class="btn-block">
                <input type="submit" value="Upload" class="btn btn-dark btn-block text-white" style="background-color: #0e1a35; margin-top: 10px">
                </div>
        </form>

               
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>

</section>

</body></html>