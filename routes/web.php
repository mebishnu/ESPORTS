<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\backend\ShippingAreaController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\ReportController;
use App\Http\Controllers\backend\SiteSettingController;
use App\Http\Controllers\backend\AdminUserController;



use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\frontend\LanguageController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\ReviewController;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


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



Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});
 
Route::middleware(['auth:admin'])->group(function(){



Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard')->middleware('auth:admin');

// Admin all routes
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');
Route::post('/admin/update/password', [AdminProfileController::class, 'adminUpdatePassword'])->name('admin.update.password');
}); //end middleware

// User all routes


Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/profile/update', [IndexController::class, 'UserProfileUpdate'])->name('user.profile.update');




Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id=Auth::user()->id;
    $user=User::find( $id);
   
    return view('dashboard', compact('user'));
})->name('dashboard');


// Admin brands all route

Route::prefix('brand')->group(function(){
 Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
 Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
 Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
 Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
 Route::get('/delete/{id}',[BrandController::class,'BrandDelete'])->name('brand.delete');


});

// Admin Category all routes

Route::prefix('category')->group(function(){
Route::get('/view',[CategoryController::class, 'CategoryView'])->name('view.category');
Route::post('/store',[CategoryController::class,'CategoryStore'])->name('category.store');
Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
Route::post('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
 Route::get('/delete/{id}',[CategoryController::class,'CategoryDelete'])->name('category.delete');
 // Admin Sub Category all routes
 Route::get('/sub/view',[SubCategoryController::class, 'SubCategoryView'])->name('view.subCategory');
 Route::post('/sub/store',[SubCategoryController::class,'SubCategoryStore'])->name('subcategory.store');
Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
Route::post('/sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
 Route::get('/sub/delete/{id}',[SubCategoryController::class,'SubCategoryDelete'])->name('subcategory.delete');
 
 // Admin sub sub Category all routes

 Route::get('/sub/sub/view',[SubCategoryController::class, 'SubSubCategoryView'])->name('view.subsubCategory');
 Route::get('/subcategory/ajax/{category_id}',[SubCategoryController::class, 'GetSubCategory']);
 Route::get('/sub-subcategory/ajax/{subcategory_id}',[SubCategoryController::class, 'GetSubSubCategory']);
 
 Route::post('/sub/sub/store',[SubCategoryController::class,'SubSubCategoryStore'])->name('subsubcategory.store');
 Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
 Route::post('/sub/sub/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
 Route::get('/sub/sub/delete/{id}',[SubCategoryController::class,'SubSubCategoryDelete'])->name('subsubcategory.delete');
 
 
});


// Admin brands all route

Route::prefix('product')->group(function(){
    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');
    Route::post('/store', [ProductController::class, 'ProductStore'])->name('product-store');
    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
    Route::get('/edit/{id}', [ProductController::class, 'ProductEdit'])->name('product.edit');
    Route::post('/data/update', [ProductController::class, 'ProductUpdate'])->name('product-update');
    Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
    Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');
    Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
    
   
   });


   //ADMIN SLIDER all routes

   Route::prefix('slider')->group(function(){
    Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');
    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name( 'slider.edit');
    Route::post('/update', [SliderController::class, 'SliderUpadte'])->name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
    Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
    Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');

    
   
    
   });


//// Frontend All Routes /////
/// Multi Language All Routes ////

Route::get('/language/nepali', [LanguageController::class, 'Nepali'])->name('nepali.language');

Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language'); 



// Frontend Product Details page url

Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);



// Frontend Product tags page url
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);


// Frontend subcategories  page url
Route::get('subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);


// Frontend Sub-SubCategory wise Data
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubSubCatWiseProduct']);


// Product View Modal with Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']); 


// Add to Cart Store Data
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);


// Get Data from mini cart
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

// Remove mini cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']); 






// wishlist Page All Route

Route::group(['prefix'=>'user','middleware'=>['user','auth'], 'namespace' =>'User'],function(){


Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');
// add to wishlist
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);
Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);

Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);
Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');
Route::get('/orderDetails/{order_id}', [AllUserController::class, 'orderDetails'])->name('orderDetails');
Route::get('/invoice_download/{order_id}', [AllUserController::class, 'invoiceDownload'])->name('invoice_download');




});

/// Mycart Page All Route

Route::get('/user/mycart', [CartPageController::class, 'ViewMycart'])->name('mycart');
Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);
Route::get('/user/mycart-remove/{rowId}', [CartPageController::class, 'RemoveMycartProduct']);
Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);
Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);

// Backend coupons All Route
Route::prefix('coupons')->group(function(){

Route::get('/view',[CouponController::class,'CouponsView'])->name('manage-coupons');
Route::post('/store',[CouponController::class,'CouponsStore'])->name('coupon.store');
Route::get('/edit/{id}',[CouponController::class,'CouponsEdit'])->name('coupon.edit');
Route::post('/update',[CouponController::class,'CouponsUpdate'])->name('coupon.update');
Route::get('/delete/{id}',[CouponController::class,'CouponsDelete'])->name('coupon.delete');


});

/// Backend Ship Division All Route
Route::prefix('shipping')->group(function(){

    // Shipping Division
    Route::get('/view',[ShippingAreaController::class,'DivisionView'])->name('manage-division');
    Route::post('/store',[ShippingAreaController::class,'DivisionStore'])->name('division.store');
    Route::get('/edit/{id}',[ShippingAreaController::class,'DivisionEdit'])->name('divison.edit');
    Route::post('/update',[ShippingAreaController::class,'DivisionUpdate'])->name('update.division');
    Route::get('/delete/{id}',[ShippingAreaController::class,'DivisionDelete'])->name('divison.delete');

    // Shipping District
    Route::get('/district/view',[ShippingAreaController::class,'DistrictView'])->name('manage-district');
    Route::post('/district/store',[ShippingAreaController::class,'DistrictStore'])->name('district.store');
    Route::get('/district/edit/{id}',[ShippingAreaController::class,'DistrictEdit'])->name('district.edit');
    Route::post('/district/update/{id}',[ShippingAreaController::class,'DistrictUpdate'])->name('district.update');
    Route::get('/district/delete/{id}',[ShippingAreaController::class,'DistrictDelete'])->name('district.delete');


    // Shipping State
    Route::get('/state/view',[ShippingAreaController::class,'StateView'])->name('manage-state');
    Route::post('/state/store',[ShippingAreaController::class,'StateStore'])->name('state.store');
    Route::get('/state/edit/{id}',[ShippingAreaController::class,'StateEdit'])->name('state.edit');
    Route::post('/state/update',[ShippingAreaController::class,'StateUpdate'])->name('state.update');
    Route::get('/state/delete/{id}',[ShippingAreaController::class,'StateDelete'])->name('state.delete');
    
    
    
     });



     // Frontend Coupon Option

Route::post('/coupon-apply', [CartController::class, 'CouponApply']);

Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);

Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

     //// Frontend Checkout Route

     Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
     Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);
     Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);   
     Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');



 //// Backend all routes related of Orders
 Route::prefix('orders')->group(function(){
    // pending orders routes
    Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending-orders');
    Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');
    Route::get('/pending/orders/delete/{order_id}', [OrderController::class, 'PendingOrdersDelete'])->name('pending.order.delete');
      
    // Confirmed Orders routes
    Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');

    /// processing-orders
    Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing-orders');

    /// picked-orders
    Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');


    ///shipped-orders
    Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');
    
     ///delivered-orders
     Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');

     //cancel-orders
     Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');


     // status update
     Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');

     /// confirm-processing
     Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm-processing');

     /// processing-picked
     Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing-picked');

     Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked.shipped');

    Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');

    Route::get('/invoice_download/{order_id}', [OrderController::class, 'AdmininvoiceDownload'])->name('invoice.download');

   

 });


   /// Backend all reports Routes



   Route::prefix('reports')->group( function(){
    
    Route::get('/view',[ReportController::class,'AllReports'])->name('all-reports');
    Route::post('/search/by/date',[ReportController::class,'ReportsDate'])->name('search-by-date');
    Route::post('/search/by/month',[ReportController::class,'ReportsMonth'])->name('search-by-month');
    Route::post('/search/by/year',[ReportController::class,'ReportsYear'])->name('date-by-year');

   });
   
   /// Backend all user routes

   Route::prefix('alluser')->group(function(){

    Route::get('/view',[AdminProfileController::class,'AllUsers'])->name('all-user');

   }); 
 

  // Admin  site setting routes

  Route::prefix('setting')->group(function(){
    Route::get('/site',[SiteSettingController::class,'SiteSetting'])->name('site-setting');
    Route::post('/site/setting/{setting_id}',[SiteSettingController::class,'SiteSettingUpdate'])->name('update.sitesetting');

    // seo setting
    Route::get('/seo',[SiteSettingController::class,'SeoSetting'])->name('seo-setting');
    Route::post('/seo/setting/{seo_id}',[SiteSettingController::class,'SeoSettingUpdate'])->name('seo.sitesetting');

  });


  /// Frontend Product Review Routes

  Route::post('/review/store', [ReviewController::class, 'ReviewStore'])->name('review.store');  

  // Admin Manage Review Routes 
Route::prefix('review')->group(function(){

    Route::get('/pending', [ReviewController::class, 'PendingReview'])->name('pending.review');
    
    Route::get('/admin/approve/{id}', [ReviewController::class, 'ReviewApprove'])->name('review.approve');
    
    Route::get('/admin/all/request', [ReviewController::class, 'PublishReview'])->name('all.request');

    Route::get('/delete/{id}', [ReviewController::class, 'DeleteReview'])->name('delete.review');
    
    });


    // Admin Manage stock  Routes 
   Route::prefix('stock')->group(function(){

    Route::get('/product', [ProductController::class, 'ProductStock'])->name('product.stock');
    
    
    });

    // Admin User Role Routes 
Route::prefix('adminuserrole')->group(function(){

    Route::get('/all', [AdminUserController::class, 'AllAdminRole'])->name('all.admin.user');
    Route::get('/add', [AdminUserController::class, 'AddAdminRole'])->name('add.admin');

    Route::post('/store', [AdminUserController::class, 'StoreAdminRole'])->name('admin.user.store');
    Route::get('/edit/admin/user/{admin_id}', [AdminUserController::class, 'EditAdminUser'])->name('edit.admin.user');

    
    
    
    });

