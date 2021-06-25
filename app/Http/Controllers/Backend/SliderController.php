<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
 use Image;

class SliderController extends Controller
{
 public function SliderView(){
    $slider=Slider::latest()->get();
     return view('Backend.slider.slider_view',compact('slider'));
 } //end method

  public function SliderStore(Request $request){
    $request->validate([

        'slider_img' => 'required',
    ],[
        'slider_img.required' => 'Plz Select One Image',

    ]);

    $image = $request->file('slider_img');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
    $save_url = 'upload/slider/'.$name_gen;

Slider::insert([
    'title' => $request->title,
    'description' => $request->description,
    'slider_img' => $save_url,

    ]);

    $notification = array(
        'message' => 'Slider Inserted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);


  } //end method
  public function SliderEdit($id){
      $slider=Slider::findOrFail($id);
      return view('Backend.slider.slider_edit',compact('slider'));

  } //end method
  public function SliderUpadte(Request $request){
    $slider_id = $request->id;
    $old_img = $request->old_image;

    if ($request->file('slider_img')) {

    unlink($old_img);
    $image = $request->file('slider_img');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
    $save_url = 'upload/slider/'.$name_gen;

Slider::findOrFail($slider_id)->update([
    'title' => $request->title,
    'description' => $request->description,
    'slider_img' => $save_url,

    ]);

    $notification = array(
        'message' => 'Slider Updated Successfully',
        'alert-type' => 'info'
    );

    return redirect()->route('manage-slider')->with($notification);

    }else{

    Slider::findOrFail($slider_id)->update([
    'title' => $request->title,
    'description' => $request->description,


    ]);

    $notification = array(
        'message' => 'Slider Updated Without Image Successfully',
        'alert-type' => 'info'
    );

    return redirect()->route('manage-slider')->with($notification);

    } // end else 
  }//end method


  public function SliderDelete($id){

      $slider=Slider::findOrFail($id);
      $slider_img=$slider->slider_img;
      unlink($slider_img);

      Slider::findOrFail($id)->delete();
      $notification = array(
        'message' => 'Slider Delete Successfully',
        'alert-type' => 'info'
    );

    return redirect()->route('manage-slider')->with($notification);
  } // end method
   
  public function SliderInactive($id){
    Slider::findOrFail($id)->update(['status' => 0]);

    $notification = array(
        'message' => 'Slider Inactive Successfully',
        'alert-type' => 'info'
    );

    return redirect()->back()->with($notification);

} // end method 


public function SliderActive($id){
    Slider::findOrFail($id)->update(['status' => 1]);

    $notification = array(
        'message' => 'Slider Active Successfully',
        'alert-type' => 'info'
    );

    return redirect()->back()->with($notification);

} // end method 



}
