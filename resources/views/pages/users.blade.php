<!DOCTYPE html>
<html>

<head>
    <title>Seller Management</title>


    <link rel="stylesheet" type="text/css" href="css/tailwind.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >



    <link rel="stylesheet" type="text/css" href="css/main.css">


</head>

<body>
    <!--NAVBAR STARTING-->

    @include('layout.header')

    <div class="sellerTable">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered">
                        <thead style="background-color: #2257d4;">
                            <tr class="text-white">
                                <th scope="col">Sno.</th>
                                <th scope="col">Name</th>
                                <th scope="col">CNIC</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Created On</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200" style="background-color: #0e1a35;">
                            @php
                            $i=1;
                            $sellers = app('firebase.firestore')->database()->collection('users/WvamEGwHsbNkF3KImk2V/sellers')->documents();
                            foreach ($sellers as $document) { 
                            $sellersDetails = $document->data();
                            $selerID=$document->Id();
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
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="inline-flex w-12 h-12">
                                        <a href="{{ $sellersDetails['profileImage'] }}" target="_blank">
                                            <img class="w-12 h-12 object-cover rounded-full" src="{{ $sellersDetails['profileImage'] }}">
                                        </a>   
                                        </div>
                                        <div>
                                            <p class="font-bold text-white">
                                                @php
                                                    {{ 
                                                        print($sellersDetails['name']); 
                                                    }}
                                                @endphp
                                            </p>
                                            <p class="text-white text-sm font-semibold tracking-wide">
                                                @php
                                                    {{
                                                        print($sellersDetails['email']);
                                                    }}
                                                @endphp
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center text-white">
                                        @php
                                            {{
                                                print($sellersDetails['cnic']);
                                            }}
                                        @endphp
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center text-white">
                                        @php
                                            {{
                                                print($sellersDetails['phoneNumber']);
                                            }}
                                        @endphp
                                    </div>
                                </td>
                                <td>
                                    <div class="text-white">
                                        @php
                                            {{
                                                print($sellersDetails['address']);
                                            }}
                                        @endphp
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center text-white">
                                        @php 
                                        {{ 
                                            $sum=0;
                                            for($j = 0 ; $j < count($sellersDetails['rating']) ; $j++){
                                                $sum += $sellersDetails['rating'][$j];
                                                
                                            }
                                            if(count($sellersDetails['rating'])>0){
                                            $avg = $sum/count($sellersDetails['rating']);
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
                                    <div class="text-center text-white">
                                        @php
                                            {{
                                                print($sellersDetails['createdDate']);
                                            }}
                                        @endphp
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center text-white">
                                        @php
                                            {{
                                                if($sellersDetails['status']==0){
                                                    @endphp
                                                    <span class="text-white text-sm w-1/3 pb-1 bg-red-600 font-semibold px-2 rounded-full">InActive</span>
                                                    @php
                                                }
                                                else{
                                                    @endphp
                                                    <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full">Active</span>
                                                    @php
                                                }
                                            }}
                                        @endphp
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center ">
                                        <a href="{{ route('user.detail', ['sellId'=>$selerID ]) }}" class="btn btn-success saveBtn">Edit</a>
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
    </div>

    <!-- <div class="modal fade" id="exampleModal" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Seller Name
                    </h5>
                    <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="gfg.png" />
                </div>
            </div>
        </div>
    </div> -->

@include('layout.footer')



</body>


<!-- <script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-analytics.js";
    import { getFirestore } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-firestore.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "AIzaSyDygdf78s5INnAvL6Wi5agJkT_Tm6cpHpE",
        authDomain: "aqua-meals-1c094.firebaseapp.com",
        projectId: "aqua-meals-1c094",
        storageBucket: "aqua-meals-1c094.appspot.com",
        messagingSenderId: "272453744530",
        appId: "1:272453744530:web:53da1832d44dc67f97734b",
        measurementId: "G-M7TFJHKP81"
    };

    // Initialize Firebase
    var app = initializeApp(firebaseConfig);
    var analytics = getAnalytics(app);

    var db = getFirestore(app);

    import { collection, doc, onSnapshot, getDocs, getDoc, setDoc, addDoc, updateDoc, deleteDoc, deleteField, where } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-firestore.js";

    var sno = 0;
    var users = [];
    async function getAllDataOnce() {
        const querySnapshot = await getDocs(collection(db, "users/WvamEGwHsbNkF3KImk2V/sellers"));


        querySnapshot.forEach(doc => {
            users.push(doc.data());
        });

        AddAllItemToTable(users);

    }

    var tbody = document.getElementById("tbody1");

    function AddAllItemToTable(Userss) {
        tbody.innerHTML = "";
        Userss.forEach(element => {
            sno++;
            var sum = 0;
            for (var number of element.rating) {
                sum += Number(number);
            }
            var averageRating;
            if (element.rating.length == 0) {
                averageRating = 0;
            }
            else {
                averageRating = sum / element.rating.length;
            }
            AddItemToTable(sno, element.address, element.cnic, element.createdDate, element.email, element.name, element.phoneNumber, element.profileImage, averageRating, element.status, element.userID);
        })
    }



    function AddItemToTable(Sno, address, cnic, createdDate, email, name, phoneNumber, profileImage, rating, status, userID,) {
        let tr = document.createElement("tr");
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");
        let td3 = document.createElement("td");
        let td4 = document.createElement("td");
        let td5 = document.createElement("td");
        let td6 = document.createElement("td");
        let td7 = document.createElement("td");
        let td8 = document.createElement("td");
        let td9 = document.createElement("td");
        let td10 = document.createElement("td");
        td1.innerHTML = `<div class="text-center text-white">
                                    ${Sno}
                                    </div>`;
        td2.innerHTML = `<div class="flex items-center space-x-3">
                                        <div class="inline-flex w-12 h-12">
                                                <img  class='w-12 h-12 object-cover rounded-full' src='${profileImage}' />
                                        </div>
                                        <div>
                                            <p class="font-bold text-white">${name}</p>
                                            <p class="text-white text-sm font-semibold tracking-wide">
                                                ${email}
                                            </p>
                                        </div>
                                    </div>`;


        td3.innerHTML = `<div class="text-center text-white">
                                    ${cnic}
                                    </div>`;
        td4.innerHTML = `<div class="text-center text-white">
                                    ${phoneNumber}
                                    </div>`;
        td5.innerHTML = `<div class="text-white">
                                    ${address}
                                    </div>`;
        td6.innerHTML = `<div class="text-center text-white">
                                    ${rating}
                                    </div>`;
        td7.innerHTML = `<div class="text-center text-white">
                                    ${createdDate}
                                    </div>`;
        if (status == 1) {
            td8.innerHTML = `<div class="text-center text-white">
                <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> Active </span>
                                    </div>`;
        }
        if (status == 0) {
            td8.innerHTML = `<div  class="text-center text-white">
                <span class="text-white text-sm w-1/3 pb-1 bg-red-600 font-semibold px-2 rounded-full">InActive</span>
                                    </div>`;
        }
        td9.innerHTML = `<div class="text-center ">
                            <button type=" button" id="${sno}" class="btn btn-success saveBtn">Edit</button>
                        </div>`;
        td10.innerHTML = `<div class="text-center text-white">
                                    ${userID}
                                    </div>`;
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tr.appendChild(td5);
        tr.appendChild(td6);
        tr.appendChild(td7);
        tr.appendChild(td8);
        tr.appendChild(td9);
        tr.appendChild(td10);

        tbody.appendChild(tr);
    }

    window.onload = getAllDataOnce;


</script> -->

</html>