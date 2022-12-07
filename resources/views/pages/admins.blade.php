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

@include('layout.header')
   

<div class="Adminpage-menu1">
    <div class="row">
        <h1> ADMIN 
<a href="{{ url('/admins/addAdmins') }}" class="addadmin btn btn-light btn-sm active text-white float-right" role="button" aria-pressed="true" style="background-color: #0e1a35; ">Add Admin</a>

        </h1>
        
    </div>
</div>

<div class="Adminpage-menu">
    
    

    <div class="container">

  <div class="row">

    <div class="col-12">
      <table class="table table-bordered sellerTable">
        <thead style="background-color: #2257d4;">
          <tr class="text-white font-bold">
            <th scope="col">S.No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @php
          $i=1;
          $admin = app('firebase.firestore')->database()->collection('users/WvamEGwHsbNkF3KImk2V/admin')->documents();
          foreach ($admin as $document) { 
          $adminDetails = $document->data();
          $adminID=$document->Id();
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
                print($adminDetails['name']); 
              }}
            @endphp
            </td>
            <td>
            @php
              {{ 
                print($adminDetails['email']); 
              }}
            @endphp
            </td>
            <td class="text-center">
            @php
              {{ 
                print($adminDetails['phone']); 
              }}
            @endphp
            </td>
            <td class="text-center">
            @php
              {{
                if($adminDetails['status']==0){
                @endphp
                  <span style="background-color: #DBF9FC;">InActive</span>
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
            <td class="text-center" style="width:150px;">
              <a href="{{ route('admin.detail', ['adminID'=> $adminID ]) }}" class="btn btn-success saveBtn">Edit</a>
              
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