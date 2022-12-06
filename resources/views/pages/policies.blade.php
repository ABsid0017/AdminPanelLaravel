<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Terms & Condition</title>

        <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity=
"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href=
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
   <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>

@include('layout.header')

<div class="Adminpage-menu1">
    <div class="row">
        <h1> Policies
            <a href="{{ url('/policies/addPolicies') }}" class="addadmin btn btn-light btn-sm active text-white float-right" role="button" aria-pressed="true" style="background-color: #0e1a35; ">Add Policies</a>
        </h1>
        
    </div>
</div>

<div class="Complaints-topmenu">
   <h1>Buyer Policies</h1>

   <div class="container">
 <div class="row">
   <div class="col-12">
     <table class="table table-bordered sellerTable">
       <thead style="background-color: #2257d4;">
         <tr class="text-white font-bold">
           <th scope="col">S.No</th>
           <th scope="col">Title</th>
           <th scope="col">Description</th>
           <th scope="col">Created Date</th>
           <th scope="col">Status</th>
            <th scope="col">Action</th>
         </tr>
       </thead>
       <tbody >
       @php
        $i=1;
        $TaCbuyer = app('firebase.firestore')->database()->collection('terms and condition/A5rdERCoEok9xzFQDMge/buyer')->documents();
        foreach ($TaCbuyer as $document) { 
        $TaCbuyerDetails = $document->data();
        $TaCbuyerID=$document->Id();
        @endphp
         <tr>
            <td class="text-center">
                @php
                {{
                    print($i);
                }}
                @endphp
            </td>
            <td style="width : 180px;">
                @php
                {{
                    print($TaCbuyerDetails['title']);
                }}
                @endphp
            </td>
            <td>
                @php
                {{
                    print($TaCbuyerDetails['description']);
                }}
                @endphp
            </td>
            <td class="text-center">
                @php
                {{
                    print($TaCbuyerDetails['createdDate']);
                }}
                @endphp
                
            </td>
            <td class="text-center">
            
                @php
                    {{
                        if($TaCbuyerDetails['status']==0){
                        @endphp
                            <span>InActive</span>
                        @php
                        }                                                
                        else{
                        @endphp
                            <span>Active</span>
                        @php
                        }
                    }}
                @endphp
            </td>
            <td style="width:165px;">
                <a href="{{ route('buyerPolicies.detail', ['TaCbuyerID'=>$TaCbuyerID ]) }}" class="btn btn-success saveBtn">Edit</a>
                <a href="{{ route('buyerPolicies.delete', ['TaCbuyerID'=>$TaCbuyerID]) }}" class="btn btn-danger">Delete</a>
            </td>
         </tr>

        @php
        $i++;
        }
        @endphp
         
       </tbody>
     </table>
   </div>
 </div>
</div>



<h1>Seller Policies</h1>

<div class="container">
 <div class="row">
   <div class="col-12">
     <table class="table table-bordered sellerTable">
       <thead style="background-color: #2257d4;">
         <tr class="text-white font-bold">
           <th scope="col">S.No</th>
           <th scope="col">Title</th>
           <th scope="col">Description</th>
           <th scope="col">Created Date</th>
           <th scope="col">Status</th>
            <th scope="col">Action</th>
         </tr>
       </thead>
       <tbody >
       @php
        $i=1;
        $TaCseller = app('firebase.firestore')->database()->collection('terms and condition/A5rdERCoEok9xzFQDMge/seller')->documents();
        foreach ($TaCseller as $document) { 
        $TaCsellerDetails = $document->data();
        $TaCsellerID=$document->Id();
        @endphp
         <tr>
            <td class="text-center">
                @php
                {{
                    print($i);
                }}
                @endphp
            </td>
            <td style="width : 180px;">
                @php
                {{
                    print($TaCsellerDetails['title']);
                }}
                @endphp
            </td>
            <td>
                @php
                {{
                    print($TaCsellerDetails['description']);
                }}
                @endphp
            </td>
            <td class="text-center">
                @php
                {{
                    print($TaCsellerDetails['createdDate']);
                }}
                @endphp
            </td>
            <td class="text-center">
            
                @php
                    {{
                        if($TaCsellerDetails['status']==0){
                        @endphp
                            <span>InActive</span>
                        @php
                        }                                                
                        else{
                        @endphp
                            <span>Active</span>
                        @php
                        }
                    }}
                @endphp
            </td>
            <td style="width:165px;">
            <a href="{{ route('sellerPolicies.detail', ['TaCsellerID'=>$TaCsellerID ]) }}" class="btn btn-success saveBtn">Edit</a>
            <a href="{{ route('sellerPolicies.delete', ['TaCsellerID'=>$TaCsellerID]) }}" class="btn btn-danger">Delete</a>
            </td>
         </tr>

        @php
        $i++;
        }
        @endphp
         
       </tbody>
     </table>
   </div>
 </div>
</div>
   </div>


@include('layout.footer')
</body>
</html>
