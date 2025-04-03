<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LinechartController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\StoreproductController;
use App\Http\Controllers\LoadController;
use App\Http\Controllers\AjaxproductController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PiechartController;
use App\Http\Controllers\TraitpostController;
use App\Http\Controllers\WordpressPostController;
use App\Http\Controllers\ShopifyPostController;
use App\Http\Controllers\GraphchartController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TwoFactorCodeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\QrProductController;
use App\Http\Controllers\MultipleimageController;
use App\Http\Controllers\QuillController;

Route::get('/', function () {
    return view('welcome');
});

// auth
Route::middleware(['auth', 'verified', 'two.factor'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// OTP Login
Route::get('verify',[TwoFactorCodeController::class,'verify'])->name('verify');
Route::get('verify/resend',[TwoFactorCodeController::class,'resend'])->name('verify.resend');
Route::post('verify',[TwoFactorCodeController::class,'verifyPost'])->name('verify.post');

// Multi Auth 
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:agent'])->group(function(){
    Route::get('/agent/dashboard', [AgentController::class, 'dashboard'])->name('agent.dashboard');
});

// Ajax Dropdown
Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
Route::post('/get-states', [LocationController::class, 'getStates'])->name('getStates');
Route::post('/get-cities', [LocationController::class, 'getCities'])->name('getCities');

// Ajax CRUD Operation using Yajra datatables
Route::resource('ajaxproducts', AjaxproductController::class);

// Send Mail and Send Notification
Route::get('send-mail', [MailController::class, 'index'])->name('send-mail');
Route::get('user-notify', [UserController::class, 'notification'])->name('user-notify');

// Get User Location using IP Address
Route::get('address', [AddressController::class, 'index'])->name('address.index');

// Image Upload with CRUD with Toastr Notification
Route::resource('posts', PostController::class);

Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
Route::get('/invoices/{id}/pdf', [InvoiceController::class, 'downloadPDF'])->name('invoices.downloadPDF');

Route::resource('qr_products', QrProductController::class);

// Calender Event
Route::controller(FullCalenderController::class)->group(function(){
    Route::get('fullcalender', 'index')->name('fullcalender');
    Route::post('fullcalenderAjax', 'ajax')->name('fullcalender.ajax');
});

// Yajra Datable
Route::get('datatables', [DatatableController::class, 'index'])->name('datatables');

// Localization
Route::middleware(['setlocale'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('lang', [LanguageController::class, 'change'])->name("change.lang");
});

// Scout elastic search with Algolia driver and Confirm Box Before Delete Record from Database
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// charts
Route::view('charts', 'charts')->name('charts');
Route::get('linechart', [LinechartController::class, 'index'])->name('linechart');
Route::get('piechart', [PiechartController::class, 'index'])->name('piechart');
Route::get('graphchart', [GraphchartController::class, 'index'])->name('graphchart');

// Generate Thumbnail Image and Add Blur Effect to Image
Route::get('image-upload', [ImageController::class, 'index'])->name('image.index');
Route::post('image-upload', [ImageController::class, 'store'])->name('image.store');

// Model Events
Route::get('/create-note', [NoteController::class, 'create']);
Route::get('/update-note/{id}', [NoteController::class, 'update']);
Route::get('/delete-note/{id}', [NoteController::class, 'delete']);

// Display Image from Storage Folder
Route::get('/upload', [ImageUploadController::class, 'showUploadForm'])->name('image.form');
Route::post('/upload', [ImageUploadController::class, 'uploadImage'])->name('image.upload');

// Store JSON Format Data in Database
Route::get('storeproducts/create', [StoreproductController::class, 'create']);
Route::get('storeproducts/search', [StoreproductController::class, 'search']);

// Load More Data on Scroll Event
Route::get('loads',[LoadController::class,'index'])->name('loads.index');

// Generate PDF File using DomPDF Package
Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('generatePDF');

// all file
Route::view('all','all')->name('all');

// multiple image upload
Route::get('image-upload', [MultipleimageController::class, 'index']);
Route::post('image-upload', [MultipleimageController::class, 'store'])->name('image.store');

// Quill Rich Text Editor
Route::get('quill-editor', [QuillController::class, 'index']);
Route::post('quill-editor', [QuillController::class, 'store'])->name('quill.store');

// Change Date Format
Route::get('/date-format', [DateController::class, 'changeDateFormat'])->name('date-format');
Route::get('/date-blade', [DateController::class, 'showDateInBlade'])->name('date-blade');

// Get,Set and Delete Cookie
Route::get('/set-cookie', [CookieController::class, 'setCookie']);
Route::get('/get-cookie', [CookieController::class, 'getCookie']);
Route::get('/delete-cookie', [CookieController::class, 'deleteCookie']);

// Custom traits
Route::get('/traitpost', [TraitpostController::class, 'index']);

// Interface
Route::get('/post-wordpress', [WordpressPostController::class, 'index']);
Route::get('/post-shopify', [ShopifyPostController::class, 'index']);

// Custom helper function
Route::get('call-helper', function(){
  
    $mdY = convertYmdToMdy('2022-02-12');
    var_dump("Converted into 'MDY': " . $mdY);
    
    $ymd = convertMdyToYmd('02-12-2022');
    var_dump("Converted into 'YMD': " . $ymd);
});

// PayPal Payment Routes
Route::get('paypal_payment', function () {
    return view('payments.paypal_payment');
})->name('paypal_payment');

Route::post('paypal', [PaymentController::class, 'paypalpayment'])->name('paypal');
Route::get('paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
Route::get('paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');

Route::get('paypal_success', function () {
    return view('payments.paypal_success');
})->name('paypal.success.view');

// Stripe Payment Routes
Route::get('stripe_payment', function () {
    return view('payments.stripe_payment');
})->name('stripe_payment');

Route::post('stripe', [PaymentController::class, 'stripePayment'])->name('stripe');
Route::get('stripe/success', [PaymentController::class, 'stripeSuccess'])->name('stripe.success');
Route::get('stripe/cancel', [PaymentController::class, 'stripeCancel'])->name('stripe.cancel');

require __DIR__.'/auth.php';
