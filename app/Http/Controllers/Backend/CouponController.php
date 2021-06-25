<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function CouponsView(){
       $coupons=Coupon::orderBy('id','DESC')->get();
       return view('Backend.coupon.view_coupon',compact('coupons'));
    } //end method


    public function CouponsStore(Request $request){
        $request->validate([
         'coupon_name'=> 'required',
         'coupon_discount'=> 'required',
         'coupon_validity'=> 'required',


        ]);
        Coupon::insert([
            'coupon_name'=> strtoupper($request->coupon_name),
            'coupon_discount'=> $request->coupon_discount,
            'coupon_validity'=> $request->coupon_validity,
            'created_at'=>Carbon::now(),


        ]);
        $notification = array(
			'message' => 'Coupon Inserted Successfully',
			'alert-type' => 'success'
		);
        return back()->with($notification);

    } // end method

    public function CouponsEdit($id){

     $coupons = Coupon::findOrFail($id);
    	return view('Backend.coupon.edit_coupon',compact('coupons'));
 
    } // end method
     public function CouponsUpdate(Request $request){
         Coupon::findOrFail($request->couponId)->update([
            'coupon_name'=> strtoupper($request->coupon_name),
            'coupon_discount'=> $request->coupon_discount,
            'coupon_validity'=> $request->coupon_validity,
            'updated_at'=>Carbon::now(),

         ]);
         $notification = array(
			'message' => 'Coupon Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('manage-coupons')->with($notification);
     } //end method


     public function CouponsDelete($id){
         Coupon::findOrFail($id)->delete();
        $notification = array(
			'message' => 'Coupon Delete Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('manage-coupons')->with($notification);

     } // end method
}
