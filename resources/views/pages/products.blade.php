
<!DOCTYPE html>
<html>

<head>
    <title>Products Management</title>


    <link rel="stylesheet" type="text/css" href="css/tailwind.min.css">
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <link rel="stylesheet" href=
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >

    <link rel="stylesheet" type="text/css" href="css/main.css">


</head>

<body>
    <!--NAVBAR STARTING-->

    @include('layout.header')

    <div class="sellerTable">
        <div class="container-fluid">
                <div class="col-xs-12">
                    <table class="table table-bordered">
                        <thead style="background-color: #2257d4;">
                            <tr class="text-white">
                                <th scope="col">S.no</th>
                                <th scope="col">Name</th>
                                <th scope="col">Upload Date</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Seller</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody id="tbody1" class="divide-y divide-gray-200" style="background-color: #0e1a35;">
                        @php
                        $i=1;
                        $products = app('firebase.firestore')->database()->collection('products')->documents();
                        foreach($products as $document){
                        $row = $document->data();
                        $rowId = $document->Id();
                        @endphp
                            <tr>
                                <td>
                                    <div class="text-center text-white">
                                    @php
                                        {{ 
                                            print($i); 
                                        }}
                                    @endphp
                                    </div>
                                </td>
                                <td style="width: 250px;" >
                                    <div class="flex items-center space-x-3">
                                        <div class="inline-flex w-12 h-12">
                                            <a href="{{ $row['imageURL'] }}" target="_blank">
                                                <img class="w-12 h-12 object-cover rounded-full" src="{{ $row['imageURL'] }}">
                                            </a>
                                        </div>
                                        <div>
                                            <p class="font-bold text-white">Name : 
                                                <span style="color: #f2bc94;" >
                                                    @php
                                                        {{ 
                                                            print($row['name']); 
                                                        }}
                                                    @endphp
                                                </span>
                                            </p>
                                            <p class="text-white text-xs  tracking-wide">Category : 
                                                <span style="color: #f2bc94;" >
                                                    @php
                                                        {{ 
                                                            print($row['category']); 
                                                        }}
                                                    @endphp
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td style="width:120px;">
                                    <div class="text-center text-sm text-white">
                                        <p>Created Date : 
                                            <span style="color: #f2bc94;" >
                                                    @php
                                                        {{ 
                                                            print($row['createdDate']); 
                                                        }}
                                                    @endphp
                                            </span>
                                        </p>
                                        <p>Updated Date : <br>
                                            <span style="color: #f2bc94;" >
                                                @php
                                                    {{  
                                                        if($row['updatedDate']!=null){
                                                            print($row['updatedDate']); 
                                                        }
                                                        else{
                                                            print('-');
                                                        }
                                                    }}
                                                @endphp
                                            </span>
                                        </p>
                                    </div>
                                </td>
                                <td style="width:120px;">
                                    <div class="text-center text-sm text-white">
                                        <p>Regular price : <br>
                                            <span style="color: #f2bc94;">
                                                <span class="font-bold">
                                                    @php
                                                        {{ 
                                                            print($row['regularPrice']); 
                                                        }}
                                                    @endphp
                                                </span> / 
                                                <span class="text-xs">
                                                    @php
                                                        {{ 
                                                            print($row['unit']); 
                                                        }}
                                                    @endphp
                                                </span>
                                            </span>
                                        </p>
                                        <p>Discount price : <br>
                                            <span style="color: #f2bc94;">
                                                <span class="font-bold">
                                                    @php
                                                        {{
                                                            if($row['discountedPrice'] != null){
                                                                print($row['discountedPrice']);
                                                                @endphp
                                                                </span> / 
                                                                <span class="text-xs">
                                                                @php
                                                                    {{ 
                                                                        print($row['unit']); 
                                                                    }}
                                                                @endphp
                                                                </span>
                                                                </span>
                                                                @php
                                                            }
                                                            else{
                                                                print('-');
                                                            }
                                                        }}
                                                    @endphp
                                            
                                        </p>
                                    </div>
                                </td>
                                <td style="width:220px;" >
                                    <div class="text-white" style="width:220px;">
                                        @php
                                            {{ 
                                                print($row['description']); 
                                            }}
                                        @endphp
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center text-white">
                                        @php 
                                            {{ 
                                                $sum=0;

                                                for($j = 0 ; $j < count($row['rating']) ; $j++){
                                                    
                                                    $sum+=$row['rating'][$j];
                                                
                                                }
                                                if(count($row['rating'])>0){
                                                    $avg = $sum/count($row['rating']);
                                                    print(round($avg,1));
                                                }
                                                else{
                                                    print('0');
                                                }
                                            }}
                                        @endphp
                                    </div>
                                </td>
                                <td>
                                    <a class="text-center text-white" href="{{ route('user.detail', ['sellId'=> $row['sellerID'] ]) }}">
                                        @php
                                            {{ 
                                                print($row['sellerID']); 
                                            }}
                                        @endphp
                                    </a>
                                </td>
                                <td>
                                    <div class="text-center text-white" style="width:80px;">
                                        @php
                                            {{
                                                if($row['status']==0){
                                                    @endphp
                                                    <span class="text-white text-sm w-1/3 pb-1 bg-red-600 font-semibold px-2 rounded-full">Out-Stock</span>
                                                    @php
                                                }
                                                else{
                                                    @endphp
                                                    <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full">In-Stock</span>
                                                    @php
                                                }
                                            }}
                                        @endphp
                                        
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center ">
                                        
                                        <a href="{{ route('product.delete', ['prodId'=>$rowId ]) }}" class="btn btn-danger">Delete</a>
                                    </div>
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







    @include('layout.footer')


    
</body>
</html>