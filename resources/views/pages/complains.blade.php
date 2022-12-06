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
   

<div class="Complaints-topmenu">
   <h1> PENDING COMPAINTS</h1>

<div class="container">
 <div class="row">
   <div class="col-12">
     <table class="table table-bordered">
       <thead>
         <tr>
           <th scope="col">S.No #</th>
           <th scope="col">Name</th>
           <th scope="col">Email</th>
           <th scope="col">Title</th>
           <th scope="col">Description</th>
            <th scope="col">Action</th>
         </tr>
       </thead>
       <tbody>
         <tr>
           <th scope="row">1</th>
           <td>Hassan Ali Gohar</td>
           <td>hasankhan545454@gmail.com</td>
           <td>Complaint 01</td>
           <td>Here is my first Complaint</td>
           <td>
            <button type="button" class="btn btn-primary button">View</button>
             <button type="button" class="btn btn-success button">Resolved</button>
           </td>
         </tr>
         <tr>
           <th scope="row">2</th>
           <td>Hassan Ali Gohar</td>
           <td>hasankhan545454@gmail.com</td>
           <td>Complaint 01</td>
           <td>Here is my first Complaint</td>
           <td>
             <button type="button" class="btn btn-primary button">View</button>
             <button type="button" class="btn btn-success button">Resolved</button>
           </td>
         </tr>
         <tr>
           <th scope="row">3</th>
           <td>Hassan Ali Gohar</td>
           <td>hasankhan545454@gmail.com</td>
           <td>Complaint 01</td>
           <td>Here is my first Complaint</td>
           <td>
             <button type="button" class="btn btn-primary button">View</button>
             <button type="button" class="btn btn-success button">Resolved</button>
           </td>
         </tr>
       </tbody>
     </table>
   </div>
 </div>
</div>



<h1> RESOLVED COMPAINTS</h1>

<div class="container">
 <div class="row">
   <div class="col-12">
     <table class="table table-bordered">
       <thead>
         <tr>
           <th scope="col">S.No #</th>
           <th scope="col">Name</th>
           <th scope="col">Email</th>
           <th scope="col">Title</th>
           <th scope="col">Description</th>
            <th scope="col">Action</th>
         </tr>
       </thead>
       <tbody>
         <tr>
           <th scope="row">1</th>
           <td>Hassan Ali Gohar</td>
           <td>hasankhan545454@gmail.com</td>
           <td>Complaint 01</td>
           <td>Here is my first Complaint</td>
           <td>
            <button type="button" class="btn btn-primary button">View</button>
           </td>
         </tr>
         <tr>
           <th scope="row">2</th>
           <td>Hassan Ali Gohar</td>
           <td>hasankhan545454@gmail.com</td>
           <td>Complaint 01</td>
           <td>Here is my first Complaint</td>
           <td>
             <button type="button" class="btn btn-primary button">View</button>
           </td>
         </tr>
         <tr>
           <th scope="row">3</th>
           <td>Hassan Ali Gohar</td>
           <td>hasankhan545454@gmail.com</td>
           <td>Complaint 01</td>
           <td>Here is my first Complaint</td>
           <td>
             <button type="button" class="btn btn-primary button">View</button>
           </td>
         </tr>
       </tbody>
     </table>
   </div>
 </div>
</div>
   </div>



  

@include('layout.footer')

<!-- Footer -->
<!-- Footer -->

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


</html>