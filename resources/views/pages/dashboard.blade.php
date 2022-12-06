<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity=
"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous" >
    <link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">

     
     <!-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
 -->

</head>

<body>

@include('layout.header')
   


  
<section id="counter" class="sec-padding" > 
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 ">
                    <a href="{{ url('/users') }}">
                        <div class="count"> 
                            <span class="fa fa-smile-o"></span>
                            <p class="number">{{ $sellersCount }}</p>
                            <h4>Sellers</h4> 
                        </div>
                    </a>
                </div>
                <div class="col-md-3 ">
                    <a href="{{ url('/products') }}">
                        <div class="count">  
                            <span class="fa fa-archive"></span>
                            <p class="number text-white">{{ $productCount }}</p>
                            <h4>Products</h4>
                        </div> 
                    </a>
                </div>
                <div class="col-md-3 ">
                    <a href="{{ url('/complains') }}">
                        <div class="count">
                            <span class="fa fa-list-alt"></span>
                            <p class="number">896</p>
                            <h4>Complaints</h4> 
                        </div>
                    </a>
                </div>
                <div class="col-md-3 ">
                    <div class="count"> <span class="fa fa-shopping-cart"></span>
                        <p class="number">{{ $orderCount }}</p>
                        <h4>Orders</h4> </div>
                </div>
            </div>
        </div>
    </section>

@include('layout.footer')

<!-- Footer -->
<!-- Footer -->

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


</html>