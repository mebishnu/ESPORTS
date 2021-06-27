<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;
use App\Models\OrderItem;
use PDF;

class OrderController extends Controller

{
    // pending orders
    public function PendingOrders(){
        $order=Order::where('status','Pending')->orderBy('id','DESC')->get();
        return view('Backend.orders.pending_orders',compact('order'));
    } // end method

    /// pending orders details

    public function PendingOrdersDetails($order_id){
        $order=Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('Backend.orders.pending_orders_details',compact('order','orderItem'));
        
    } //end method

    // pending orders details delete

    public function PendingOrdersDelete($order_id){
        Order::findOrFail($order_id)->delete();
        $notification = array(
			'message' => 'Coupon Delete Successfully',
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);
    } // end method



    /// ConfirmedOrders ////

    public function ConfirmedOrders(){
        $order=Order::where('status','confirm')->orderBy('id','DESC')->get();
        return view('Backend.orders.confirmed_orders',compact('order'));

    } // end method

    ///processing orders

    public function ProcessingOrders(){
        $order=Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('Backend.orders.processing_orders',compact('order'));

    } // end method
    

    /// PickedOrders

    public function PickedOrders(){

        $order=Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('Backend.orders.picked_orders',compact('order'));
    } // end method
     

    /// ShippedOrders

    public function ShippedOrders(){
        $order=Order::where('status','shipped')->orderBy('id','DESC')->get();
        return view('Backend.orders.shipped_orders',compact('order')); 
    } //end method

   /// DeliveredOrders
   public function DeliveredOrders(){
    
        $order=Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('Backend.orders.delivered_orders',compact('order')); 
   } // end method


   public function CancelOrders(){
    $order=Order::where('status','cancel')->orderBy('id','DESC')->get();
    return view('Backend.orders.cancel_orders',compact('order'));
   } //end method

   /// PendingToConfirm

   public function PendingToConfirm($order_id){
    Order::findOrFail($order_id)->update(['status'=> 'confirm']);
    $notification = array(
        'message' => 'Order Confirm Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('pending-orders')->with($notification);


   } //end method


   /// ConfirmToProcessing order

   public function ConfirmToProcessing($order_id){
    Order::findOrFail($order_id)->update(['status'=> 'processing']);
    $notification = array(
        'message' => 'Order Processing Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('confirmed-orders')->with($notification);

   } // end method


   ///  ProcessingToPicked


   public function ProcessingToPicked($order_id){
    Order::findOrFail($order_id)->update(['status'=> 'picked']);
    $notification = array(
        'message' => 'Order PickedSuccessfully',
        'alert-type' => 'success'
    );

    return redirect()->route('processing-orders')->with($notification);

   } // end method


   public function PickedToShipped($order_id){

    Order::findOrFail($order_id)->update(['status' => 'shipped']);

    $notification = array(
          'message' => 'Order Shipped Successfully',
          'alert-type' => 'success'
      );

      return redirect()->route('picked-orders')->with($notification);


  } // end method


   public function ShippedToDelivered($order_id){

    Order::findOrFail($order_id)->update(['status' => 'delivered']);
    foreach ($product as $item) {
        Product::where('id',$item->product_id)
                ->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
    }

    $notification = array(
          'message' => 'Order Delivered Successfully',
          'alert-type' => 'success'
      );

      return redirect()->route('shipped-orders')->with($notification);


  } // end method


  /// Admin invoiceDownload

  public function AdmininvoiceDownload($order_id){
    $order=Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
    $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    // return view('frontend.user.order.order_invoice',compact('order','orderItem'));
    $pdf = PDF::loadView('Backend.orders.order_invoice', compact('order','orderItem'))->setPaper('a4')->setOptions([
        'tempDir' => public_path(),
        'chroot' => public_path(),
]);
   return $pdf->download('invoice.pdf');

  }

}
