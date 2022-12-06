<!DOCTYPE html>
<html>

<head>
    <title>Product Detail</title>
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
        <li> <a class="btn btn-light" href="{{ url('/products') }}" role="button" style="background: #0e1a35; color: #fff;">Back</a></li>
            <li> <a class="btn btn-light" href="{{ url('/') }}" role="button" style="background: #0e1a35; color: #fff;">Logout</a></li>
            
        </ul>
    </nav>

      {{ print_r($productDetail); }}
      {{ print($productID); }}


    <section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5" style="font-family: aristotelica display trial;text-decoration:none;">Product Details</h2>
              <hr>
              <form>

                <div class="form-outline mb-1 text-center">
                    <a href="{{$productDetail['imageURL']}}" target="blank">
                        <img src="{{$productDetail['imageURL']}}" class="rounded-circle" height="200" width="200" >
                    </a>
                </div>

                <div class="form-outline mb-1">
                  <label class="form-label" for="form3Example1cg">Name</label>
                  <input type="text" id="form3Example1cg" class="form-control" value="{{$productDetail['name']}}" disabled />
                  <label class="form-label" for="form3Example1cg">Category</label>
                  <input type="text" id="form3Example1cg" class="form-control" value="{{$productDetail['category']}}" disabled />
                </div>

                
                <div class="form-outline mb-1 ">
                  <div class="row">
                    <div class="col-lg-6">
                   <label class="form-label" for="form3Example4cg">Created Date</label>
                   <input type="text" id="form3Example4cg" class="form-control "value="{{$productDetail['createdDate']}}" disabled/>
                  </div>
                  <div class="col-lg-6">
                  <label class="form-label" for="form3Example4cg">Updated Date</label>
                  <input type="text" id="form3Example4cg" class="form-control "value="{{$productDetail['updatedDate']}}" disabled />
                  </div>
              </div>
                 
                 
                </div>
               
                   <div class="form-outline mb-1 ">
                  <div class="row">
                    <div class="col-lg-6">
                   <label class="form-label" for="form3Example4cg">Regular Price </label>
                   <input type="text" id="form3Example4cg" class="form-control "value="{{$productDetail['regularPrice']}}" disabled/>
                  </div>
                  <div class="col-lg-6">
                  <label class="form-label" for="form3Example4cg">Discount Price</label>
                  <input type="text" id="form3Example4cg" class="form-control "value="{{$productDetail['discountedPrice']}}" disabled/>
                 
                </div>
              </div>
                 
                 
                </div>
               <div class="form-group form-outline mb-1">
              <label for="exampleFormControlTextarea1">Descrption</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>{{$productDetail['description']}}</textarea>
              </div>

              <div class="form-outline mb-1">
                  <label class="form-label" for="form3Example4cg">Rating</label>
                  <input type="text" id="form3Example4cg" class="form-control " 
                  value=
                  " @php 
                                        {{ 
                                            $sum=0;
                                            for($j = 0 ; $j < count($productDetail['rating']) ; $j++){
                                                $sum += $productDetail['rating'][$j];
                                                
                                            }
                                            if(count($productDetail['rating'])>0){
                                            $avg = $sum/count($productDetail['rating']);
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
                  <label class="form-label" for="form3Example4cdg">Product ID</label>
                  <input type="text" class="form-control " name="phone"  value="{{ $productID }}" disabled>
                </div>

                <div class="form-group">
                  <label for="exampleFormControlSelect1">Status</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="statusDD">
                        @php
                        {{
                            if($productDetail['status'] == 1){
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