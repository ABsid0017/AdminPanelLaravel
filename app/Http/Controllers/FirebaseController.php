<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FirebaseController extends Controller
{


    public function dasboardCount(){
        $sellerDetails=[];
        $productDetails=[];
        $orderDetails=[];
        $sellers = app('firebase.firestore')->database()->collection('users/WvamEGwHsbNkF3KImk2V/sellers')->documents();
        foreach ($sellers as $document) { 
            array_push($sellerDetails, $document->data());
        }
        $products = app('firebase.firestore')->database()->collection('products')->documents();
        foreach ($products as $document) { 
            array_push($productDetails, $document->data());
        }
        $orders = app('firebase.firestore')->database()->collection('orders/3I5gqAREx3MaA4C89QvT/orders')->documents();
        foreach ($orders as $document) { 
            array_push($orderDetails, $document->data());
        }

        $sellersCount = count($sellerDetails);
        $productCount = count($productDetails);
        $orderCount = count($orderDetails);
        return view('pages.dashboard',compact('sellersCount','productCount','orderCount'));
    }


    //open selller detail
    public function getUserDetail($sellId){
        
        $sellers = app('firebase.firestore')->database()->collection('users/WvamEGwHsbNkF3KImk2V/sellers')->document($sellId);
        $snapshot = $sellers->snapshot()->data();
        $sellerDetail = $snapshot;
        $sellerID = $sellers->snapshot()->Id();
        
        return view('inner_pages/sellerDetailsShow',compact('sellerDetail','sellerID'));
    }
    //update seller in firestore then retrun a user table
    public function updateSeller(Request $request)
    {
        $sellerID = $request->sellerID;
        $status = $request->statusDD;
        $seller = app('firebase.firestore')->database()->collection('users/WvamEGwHsbNkF3KImk2V/sellers')->document($sellerID)->update([['path' => 'status', 'value' => (int)$status]]);
        return view('pages/users');
    }

    //Delete seller in firestore then retrun a user table
    // public function deleteSeller($sellId){
        
    //     $sellers = app('firebase.firestore')->database()->collection('users/WvamEGwHsbNkF3KImk2V/sellers')->document($sellId)->delete();
        
    //     $productWRTSeller = app('firebase.firestore')->database()->collection('products')->where('sellerID', '=', $sellId);
    //     $snapshot = $productWRTSeller->documents();
    //     foreach ($snapshot as $document) {
    //         app('firebase.firestore')->database()->collection('products')->document($document->id())->delete();
    //     }
    //     $deleteSellerAuth = app('firebase.auth')->deleteUser($sellId);

        // $url=url('/users');
        // $Heading='Seller Delete Successfully';
        // return view('inner_pages/deletePage',compact('url','Heading'));
    // }

    //Delete Product in firestore then retrun a products table
    public function deleteProduct($prodId){
        
        $product = app('firebase.firestore')->database()->collection('products')->document($prodId)->delete();
        $url=url('/products');
        $Heading='Product Delete Successfully';
        return view('inner_pages/deletePage',compact('url','Heading'));
    }



    //Add New Policy
    public function addNewPolicy(Request $request)
    {
        $policyFor = $request->policyFor;
        // $title = $request->title;
        // $description = $request->description;
        // $status = $request->status;
        // $date = date("j/M/Y");
        // print($policyFor);
        // print($title);
        // print($description);
        // print($status);
        // print($date);
        if($policyFor == "Buyer")
        {
            $title = $request->title;
            $description = $request->description;
            $status = $request->status;
            $date = date("j/M/Y");
            $addedDocRef = app('firebase.firestore')->database()->collection('terms and condition/A5rdERCoEok9xzFQDMge/buyer')->add([
                'createdDate' => $date,
                'status' => (int)$status,
                'title' => $title,
                'description' => $description
            ]);
        }
        else if($policyFor == "Seller"){
            $title = $request->title;
            $description = $request->description;
            $status = $request->status;
            $date = date("j/M/Y");
            $addedDocRef = app('firebase.firestore')->database()->collection('terms and condition/A5rdERCoEok9xzFQDMge/seller')->add([
                'createdDate' => $date,
                'status' => (int)$status,
                'title' => $title,
                'description' => $description
            ]);
        }
        // $policy = app('firebase.firestore')->database()->collection('terms and condition/A5rdERCoEok9xzFQDMge/seller')->document($sellerPolicesID)->update([['path' => 'status', 'value' => (int)$status]]);
        return view('pages/policies');
    }

    //show buyer policy
    public function getPoliciesBuyer($TaCbuyerID){
        
        $buyerPolices = app('firebase.firestore')->database()->collection('terms and condition/A5rdERCoEok9xzFQDMge/buyer')->document($TaCbuyerID);
        $snapshot = $buyerPolices->snapshot()->data();
        $buyerPolicesDetail = $snapshot;
        $buyerPolicesID = $buyerPolices->snapshot()->Id();
        
        return view('inner_pages/editPoliciesBuyer',compact('buyerPolicesDetail','buyerPolicesID'));
    }
    //update buyer policy
    public function updateBuyerPolicy(Request $request)
    {
        $buyerPolicesID = $request->buyerPolicesID;
        $status = $request->statusDD;
        $policy = app('firebase.firestore')->database()->collection('terms and condition/A5rdERCoEok9xzFQDMge/buyer')->document($buyerPolicesID)->update([['path' => 'status', 'value' => (int)$status]]);
        return view('pages/policies');
    }
    //Delete buyer policy in firestore
    public function deleteBuyerPolicy($TaCbuyerID){
        
        $product = app('firebase.firestore')->database()->collection('terms and condition/A5rdERCoEok9xzFQDMge/buyer')->document($TaCbuyerID)->delete();
        $url=url('/policies');
        $Heading='Buyer Policy Deleted Successfully';
        return view('inner_pages/deletePage',compact('url','Heading'));
    }

    //show seller policy
    public function getPoliciesSeller($TaCsellerID){
        
        $sellerPolices = app('firebase.firestore')->database()->collection('terms and condition/A5rdERCoEok9xzFQDMge/seller')->document($TaCsellerID);
        $snapshot = $sellerPolices->snapshot()->data();
        $sellerPolicesDetail = $snapshot;
        $sellerPolicesID = $sellerPolices->snapshot()->Id();
        
        return view('inner_pages/editPoliciesSeller',compact('sellerPolicesDetail','sellerPolicesID'));
    }
    //update Seller policy
    public function updateSellerPolicy(Request $request)
    {
        $sellerPolicesID = $request->sellerPolicesID;
        $status = $request->statusDD;
        $policy = app('firebase.firestore')->database()->collection('terms and condition/A5rdERCoEok9xzFQDMge/seller')->document($sellerPolicesID)->update([['path' => 'status', 'value' => (int)$status]]);
        return view('pages/policies');
    }
    //Delete seller policy in firestore
    public function deleteSellerPolicy($TaCsellerID){
        
        $product = app('firebase.firestore')->database()->collection('terms and condition/A5rdERCoEok9xzFQDMge/seller')->document($TaCsellerID)->delete();
        $url=url('/policies');
        $Heading='Seller Policy Deleted Successfully';
        return view('inner_pages/deletePage',compact('url','Heading'));
    }

    //get admin details
    public function getAdminDetail($adminID){
        
        $admin = app('firebase.firestore')->database()->collection('users/WvamEGwHsbNkF3KImk2V/admin')->document($adminID);
        
        $adminDetail = $admin->snapshot()->data();
        $adminID = $admin->snapshot()->Id();
        
        return view('inner_pages/editAdmin',compact('adminDetail','adminID'));
    }
    //update admin details
    public function updateAdminDetail(Request $request)
    {
        $adminID = $request->adminID;
        $status = $request->statusDD;
        $admin = app('firebase.firestore')->database()->collection('users/WvamEGwHsbNkF3KImk2V/admin')->document($adminID)->update([['path' => 'status', 'value' => (int)$status]]);
        return view('pages/admins');
    }
    //add admin details
    public function addAdminDetail(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $phone = $request->phone;
        $status = $request->statusDD;
        $admin = app('firebase.firestore')->database()->collection('users/WvamEGwHsbNkF3KImk2V/admin')->add(['name' => $name, 'email' => $email, 'password' => $password, 'phone' => $phone, 'status' => (int)$status]);
        return view('pages/admins');
    }

    public function validateLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $flag=0;
        $admin = app('firebase.firestore')->database()->collection('users/WvamEGwHsbNkF3KImk2V/admin')->where('email', '=', $email)->where('password', '=', $password)->where('status', '=', 1)->documents();
        foreach ($admin as $document) {
            if ($document->exists()) {
                $flag=1;
            }
            else{
                $flag=0; 
            }
        }

        if($flag==1){
            $sellerDetails=[];
            $productDetails=[];
            $orderDetails=[];
            $sellers = app('firebase.firestore')->database()->collection('users/WvamEGwHsbNkF3KImk2V/sellers')->documents();
            foreach ($sellers as $document) { 
                array_push($sellerDetails, $document->data());
            }
            $products = app('firebase.firestore')->database()->collection('products')->documents();
            foreach ($products as $document) { 
                array_push($productDetails, $document->data());
            }
            $orders = app('firebase.firestore')->database()->collection('orders/3I5gqAREx3MaA4C89QvT/orders')->documents();
            foreach ($orders as $document) { 
                array_push($orderDetails, $document->data());
            }

            $sellersCount = count($sellerDetails);
            $productCount = count($productDetails);
            $orderCount = count($orderDetails);
            return view('pages.dashboard',compact('sellersCount','productCount','orderCount'));
        }
        else{
            session()->flash('error', 'Invalid Credentials');
            return redirect()->route('admin.login');
        }
    }

    public function loginPage(){
        return view('pages.login');
    }

    public function logout(Request $request)
    {
       
        $request->session()->flush();
        return redirect()->route('admin.login');
    }

}
