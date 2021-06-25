<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Auth;

class WishlistController extends Controller
{
    public function ViewWishlist(){

      return view('frontend.wishlist.view_wishlist');
    } // end method

    public function GetWishlistProduct(){

      $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
      return response()->json($wishlist);
    } // end method

    public function RemoveWishlistProduct($id){

      Wishlist::where('id',$id)->delete();
      return response()->json(['success' => 'Successfully Product Remove']);
    } //end method
  
}
