<!DOCTYPE html>
<html>

<head>
    <title>Seller Detail</title>
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
        <li> <a class="btn btn-light" href="{{ url('/users') }}" role="button" style="background: #0e1a35; color: #fff;">Back</a></li>
            <li> <a class="btn btn-light" href="{{ url('/') }}" role="button" style="background: #0e1a35; color: #fff;">Logout</a></li>
            
        </ul>
    </nav>



    <section class="vh-100">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5" style="font-family: aristotelica display trial;text-decoration:none;">Seller Details</h2>
              <form method="POST" action="{{route('seller.update')}}">
                @csrf
				<div class="form-outline mb-1 text-center">
                    <a href="{{$sellerDetail['profileImage']}}" target="blank">
                        <img src="{{$sellerDetail['profileImage']}}" class="rounded-circle" height="200" width="200" >
                    </a>
                </div>

                <div class="form-outline mb-1">
                  <label class="form-label" for="form3Example1cg">Name</label>
                  <input type="text" id="form3Example1cg" class="form-control" value="{{$sellerDetail['name']}}" disabled >
                </div>

                <div class="form-outline mb-1">
                  <label class="form-label" for="form3Example3cg">Email</label>
                  <input type="email" id="form3Example3cg" class="form-control" value="{{$sellerDetail['email']}}" disabled >
                </div>

                <div class="form-outline mb-1">
                  <label class="form-label" for="form3Example4cg">Cnic</label>
                  <input type="text" id="form3Example4cg" class="form-control " value="{{$sellerDetail['cnic']}}" disabled>
                  
                </div>

                <div class="form-outline mb-1">
                  <label class="form-label" for="form3Example4cdg">Phone Number</label>
                  <input type="tel" id="phone" class="form-control " name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" value="{{$sellerDetail['phoneNumber']}}" disabled>
                </div>
                <div class="form-outline mb-1">
                  <label class="form-label" for="form3Example4cg">Rating</label>
                  <input type="text" id="form3Example4cg" class="form-control " 
                  value=
                  " @php 
                                        {{ 
                                            $sum=0;
                                            for($j = 0 ; $j < count($sellerDetail['rating']) ; $j++){
                                                $sum += $sellerDetail['rating'][$j];
                                                
                                            }
                                            if(count($sellerDetail['rating'])>0){
                                            $avg = $sum/count($sellerDetail['rating']);
                                            print(round($avg,1));
                                            }
                                            else{
                                                print('0');
                                            }
                                        }}
                                        @endphp" 
                  disabled>
                  
                </div>
                <div class="form-outline mb-1">
                  <label class="form-label" for="form3Example4cg">Created Date</label>
                  <input type="text" id="form3Example4cg" class="form-control "value="{{ $sellerDetail['createdDate'] }}" disabled>
                  
                </div>
                <div class="form-outline mb-1">
                  <label class="form-label" for="form3Example4cg">Seller Id</label>
                  <input type="text" id="form3Example4cg" class="form-control " value="{{ $sellerID }}" name="sellerID" readonly="readonly">
                  
                </div>


  				<div class="form-group">
    			<label for="exampleFormControlSelect1">Status</label>
    			<select class="form-control" id="exampleFormControlSelect1" name="statusDD">
                @php
                {{
                    if($sellerDetail['status'] == 1){
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

</body>
</html>