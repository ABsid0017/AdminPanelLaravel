<!DOCTYPE html>
<html>

<head>
    <title>Complains</title>
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
     <table class="table table-bordered complainsTable">
       <thead>
         <tr>
           <th scope="col">S.No</th>
           <th scope="col">Name</th>
           <th scope="col">Email</th>
           <th scope="col">Title</th>
           <th scope="col">Description</th>
           <th scope="col">From</th>
           <th scope="col">Complaint Date</th>
            <th scope="col">Action</th>
         </tr>
       </thead>
       <tbody>
        @php
        $i=1;
        $name;
        $email;
        $complaints = app('firebase.firestore')->database()->collection('complaints')->where('status', '=', 0)->documents();
        foreach($complaints as $document){
        $row = $document->data();
        $rowId = $document->Id();
        if($row['from']==0){
          $buyerData = app('firebase.firestore')->database()->collection('users/WvamEGwHsbNkF3KImk2V/buyer')->document($row['complainerID'])->snapshot()->data();
          $name=$buyerData['name'];
          $email=$buyerData['email'];
        }
        else{
          $sellerData = app('firebase.firestore')->database()->collection('users/WvamEGwHsbNkF3KImk2V/sellers')->document($row['complainerID'])->snapshot()->data();
          $name=$sellerData['name'];
          $email=$sellerData['email'];
        }
        
        @endphp
         <tr>
           <th scope="row" class="text-center" style="vertical-align: middle;">
            @php
              {{ 
                  print($i); 
              }}
            @endphp
           </th>
           <td >
           @php
              {{ 
                  print($name); 
              }}
            @endphp
            </td>
           <td>
           @php
              {{ 
                  print($email); 
              }}
            @endphp
           </td>
           <td>
           @php
              {{ 
                  print($row['title']); 
              }}
            @endphp
           </td>
           <td style="width: 335px;">
            @php
              {{ 
                  print($row['description']); 
              }}
            @endphp
           </td>
            @php
              {{ 
                  if($row['from']==0){
                    @endphp
                    <td>Buyer</td>
                    @php
                  }
                  else{
                    @endphp
                    <td style="background-color:skyblue;">Seller</td>
                    @php
                  } 
              }}
            @endphp
           <td>
            @php
              {{ 
                  print($row['createdDate']); 
              }}
            @endphp
           </td>
           <td style="width: 100px;"> 
              <a href="{{ route('complain.resolved', ['complainID'=> $rowId ]) }}" type="button" class="btn btn-success button">Resolved</a>
           </td>
         </tr>
          @php
          $i++;
          $name="";
          $email="";
          }
          @endphp
       </tbody>
     </table>
   </div>
 </div>
</div>



<h1> RESOLVED COMPAINTS</h1>

<div class="container">
 <div class="row">
   <div class="col-12">
     <table class="table table-bordered complainsTable">
       <thead>
         <tr>
         <th scope="col">S.No</th>
           <th scope="col">Name</th>
           <th scope="col">Email</th>
           <th scope="col">Title</th>
           <th scope="col">Description</th>
           <th scope="col">From</th>
           <th scope="col">Complaint Date</th>
         </tr>
       </thead>
       <tbody>
       @php
        $i=1;
        $name;
        $email;
        $complaints = app('firebase.firestore')->database()->collection('complaints')->where('status', '=', 1)->documents();
        foreach($complaints as $document){
        $row = $document->data();
        $rowId = $document->Id();
        if($row['from']==0){
          $buyerData = app('firebase.firestore')->database()->collection('users/WvamEGwHsbNkF3KImk2V/buyer')->document($row['complainerID'])->snapshot()->data();
          $name=$buyerData['name'];
          $email=$buyerData['email'];
        }
        else{
          $sellerData = app('firebase.firestore')->database()->collection('users/WvamEGwHsbNkF3KImk2V/sellers')->document($row['complainerID'])->snapshot()->data();
          $name=$sellerData['name'];
          $email=$sellerData['email'];
        }
        
        @endphp
        <tr>
           <th scope="row" class="text-center" style="vertical-align: middle;">
            @php
              {{ 
                  print($i); 
              }}
            @endphp
           </th>
           <td >
           @php
              {{ 
                  print($name); 
              }}
            @endphp
            </td>
           <td>
           @php
              {{ 
                  print($email); 
              }}
            @endphp
           </td>
           <td>
           @php
              {{ 
                  print($row['title']); 
              }}
            @endphp
           </td>
           <td style="width: 335px;">
            @php
              {{ 
                  print($row['description']); 
              }}
            @endphp
           </td>
            @php
              {{ 
                  if($row['from']==0){
                    @endphp
                    <td>Buyer</td>
                    @php
                  }
                  else{
                    @endphp
                    <td style="background-color:skyblue;">Seller</td>
                    @php
                  } 
              }}
            @endphp
           <td>
            @php
              {{ 
                  print($row['createdDate']); 
              }}
            @endphp
           
         </tr>
          @php
          $i++;
          $name="";
          $email="";
          }
          @endphp
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