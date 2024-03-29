<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages/login');
});

Route::get('/dashboard', [FirebaseController::class,'dasboardCount']);

Route::get('/users', function () {
    if(session()->has('user')){
        return view('pages/users');
    }
    else{
        return redirect()->route('admin.login');
    }
});

Route::get('/products', function () {
    if(session()->has('user')){
        return view('pages/products');
    }
    else{
        return redirect()->route('admin.login');
    }
});
Route::get('/complains', function () {
    if(session()->has('user')){
        return view('pages/complains');
    }
    else{
        return redirect()->route('admin.login');
    }
    
})->name('complain.home');

Route::get('/admins', function () {
    if(session()->has('user')){
        $userDetail = session()->get('user');
        if($userDetail['role']==1){
            return view('pages/admins');
        }
        else{
            return redirect()->route('validate.login');
        }
    }
    else{
        return redirect()->route('admin.login');
    }
});

Route::get('/admins/addAdmins', function () {
    if(session()->has('user')){
        $userDetail = session()->get('user');
        if($userDetail['role']==1){
            return view('inner_pages/addAdmins');
        }
        else{
            return redirect()->route('validate.login');
        }
    }
    else{
        return redirect()->route('admin.login');
    }
});

Route::get('/policies', function () {
    if(session()->has('user')){
        return view('pages/policies');
    }
    else{
        return redirect()->route('admin.login');
    }
});

Route::get('/policies/addPolicies', function () {
    if(session()->has('user')){
        return view('inner_pages/addPolicies');
    }
    else{
        return redirect()->route('admin.login');
    }
});


//open seller detail page
Route::get('/users/showsellerdetails/{sellId}',[ FirebaseController::class ,'getUserDetail'])->name('user.detail');

//update seller
Route::post('users', [FirebaseController::class ,'updateSeller'])->name('seller.update');

//delete seller
// Route::get('/users/deleteSeller/{sellId}',[ FirebaseController::class ,'deleteSeller'])->name('seller.delete');


//productDelete
Route::get('/products/deleteProduct/{prodId}',[ FirebaseController::class ,'deleteProduct'])->name('product.delete');

//Policy add
Route::post('policiesAdd', [FirebaseController::class ,'addNewPolicy'])->name('policy.add');


//term And Condition Buyer show
Route::get('/policies/editBuyerPolicies/{TaCbuyerID}',[ FirebaseController::class ,'getPoliciesBuyer'])->name('buyerPolicies.detail');
//update term and condition buyer
Route::post('policy', [FirebaseController::class ,'updateBuyerPolicy'])->name('buyerPolicy.update');
// delete buyer policy
Route::get('/policies/deleteBuyerPolicy/{TaCbuyerID}',[ FirebaseController::class ,'deleteBuyerPolicy'])->name('buyerPolicies.delete');

//term And Condition seller show
Route::get('/policies/editsellerPolicies/{TaCsellerID}',[ FirebaseController::class ,'getPoliciesSeller'])->name('sellerPolicies.detail');
//update term and condition seller
Route::post('policies', [FirebaseController::class ,'updateSellerPolicy'])->name('sellerPolicy.update');
// delete Seller policy
Route::get('/policies/deleteSellerPolicy/{TaCsellerID}',[ FirebaseController::class ,'deleteSellerPolicy'])->name('sellerPolicies.delete');

//admin Detail Show
Route::get('/admins/editadmin/{adminID}',[ FirebaseController::class ,'getAdminDetail'])->name('admin.detail');
//update admin
Route::post('admins', [FirebaseController::class ,'updateAdminDetail'])->name('admin.update');
//Add Admin
Route::post('addAdmin', [FirebaseController::class ,'addAdminDetail'])->name('admin.add');
// delete Admin
Route::get('/admins/deleteadmin/{adminID}',[ FirebaseController::class ,'deleteAdmin'])->name('admin.delete');

//check Login
Route::post('/dashboard', [FirebaseController::class ,'validateLogin'])->name('validate.login');
// login page
Route::get('/login', [ FirebaseController::class ,'loginPage'])->name('admin.login');
//logout page
Route::get('/logout', [ FirebaseController::class ,'logout'])->name('admin.logout');

//resolved complain
Route::get('/complains/{complainID}',[ FirebaseController::class ,'updateComplainStatus'])->name('complain.resolved');