<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
  public function BrandView(){
  $brand=Brand::latest()->get();
  return view('Backend.Brand.brand_view',compact('brand'));
  }

   public function BrandStore(Request $request){

    // dd($request->brand_name_np);
    $request->validate([
    'brand_name_eng'=>'required',
    'brand_name_np'=>'required',
    'brand_image'=>'required',
    ],[
        'brand_name_eng.required' =>'Input  brand name in english',
        'brand_name_np.required' =>'Input brand name in Nepali',

    ]);
     $image=$request->file('brand_image');
     $name_gen=hexdec(uniqid()). '.' .$image->getClientOriginalExtension();
     Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
     $save_url='upload/brand/'.$name_gen;

     Brand::insert([
        'brand_name_eng'=> $request->brand_name_eng,
        'brand_name_np'=> $request->brand_name_np,
        'brand_slug_eng'=> strtolower(str_replace(' ','-',$request->brand_name_eng)),
        'brand_slug_np'=> str_replace(' ','-',$request->brand_name_np),
        'brand_image'=> $save_url,



     ]);


     $notifiction=array(
        'message'=>'Brand Inserted update successfully',
        'alert-type'=>'success',
    );

    return redirect()->back()->with($notifiction);

   }  //end method
    
   public function BrandEdit($id){
    $brand=Brand::findOrFail($id);
    return view('Backend.Brand.brand_edit',compact('brand'));
   } 
   public function BrandUpdate(Request $request ){
       $brand_id=$request->id;
       $old_img=$request->old_image;

       if($request->file('brand_image')){
          unlink($old_img);
        $image=$request->file('brand_image');
     $name_gen=hexdec(uniqid()). '.' .$image->getClientOriginalExtension();
     Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
     $save_url='upload/brand/'.$name_gen;

     Brand::findOrFail( $brand_id)->update([
        'brand_name_eng'=> $request->brand_name_eng,
        'brand_name_np'=> $request->brand_name_np,
        'brand_slug_eng'=> strtolower(str_replace(' ','-',$request->brand_name_eng)),
        'brand_slug_np'=> str_replace(' ','-',$request->brand_name_np),
        'brand_image'=> $save_url,



     ]);


     $notifiction=array(
        'message'=>'Brand  update successfully',
        'alert-type'=>'info',
    );

    return redirect()->route('all.brand')->with($notifiction);


       }else{
     
        Brand::findOrFail( $brand_id)->update([
            'brand_name_eng'=> $request->brand_name_eng,
            'brand_name_np'=> $request->brand_name_np,
            'brand_slug_eng'=> strtolower(str_replace(' ','-',$request->brand_name_eng)),
            'brand_slug_np'=> str_replace(' ','-',$request->brand_name_np),
            
         ]);
    
    
         $notifiction=array(
            'message'=>'Brand  update successfully',
            'alert-type'=>'info',
        );
    
        return redirect()->route('all.brand')->with($notifiction);

       }
   } //end method
     public function BrandDelete($id){
        $brand=Brand::findOrFail($id);
        $img=$brand->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();
        $notifiction=array(
         'message'=>'Brand  delete successfully',
         'alert-type'=>'info',
     );
 
     return redirect()->route('all.brand')->with($notifiction);


     } //end method



}
