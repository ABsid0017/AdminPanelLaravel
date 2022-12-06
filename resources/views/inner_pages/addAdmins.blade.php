<!DOCTYPE html>
<html>

<head>
    <title>Admins</title>
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

              <form method="POST" action="{{route('admin.add')}}">
                @csrf

                <div class="form-outline mb-1">
                        <label class="form-label" for="name">Name</label>
                        <input type="text"  class="form-control" name="name" required>
                </div>

                <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="text"  class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                </div>

                <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="pass" class="form-control" name="password" required>
                  
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="retypePass">Repeat your password</label>
                  <input type="password" id="retypePass" class="form-control" required>
                  
                </div>
                <div class="form-outline mb-4">
                        <label class="form-label" for="phone">Phone</label>
                        <input type="tel" class="form-control" placeholder="03xxxxxxxxx" name="phone" pattern="[0-9]{11}"  required>
                </div>
                 <div>
                      <label for="exampleFormControlSelect1">Status</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="statusDD">
                        <option value=1 selected >Active</option>
                        <option value=0>In-Active</option>
                      </select>
                 </div>
                <div class="btn-block">
                <input type="submit" value="Submit" class="btn btn-dark btn-block text-white" style="background-color: #0e1a35; margin-top: 10px">
        
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
    </body>

    <script>
      var password = document.getElementById("pass")
        , confirm_password = document.getElementById("retypePass");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
    </script>
</html>