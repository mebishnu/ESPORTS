<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController
{
 public function CategoryView(){
     $category=Category::latest()->get();
     return view('Backend.Category.category_view',compact('category'));
 } //end method
  
 public function CategoryStore(Request $request){
    $request->validate([
        'category_name_eng'=>'required',
        'category_name_np'=>'required',
        'category_icon'=>'required',
        ],[
            'category_name_eng.required' =>'Input  Category name in english',
            'category_name_np.required' =>'Input Category name in Nepali',
    
        ]);
        
    
         Category::insert([
            'category_name_eng'=> $request->category_name_eng,
            'category_name_np'=> $request->category_name_np,
            'category_slug_eng'=> strtolower(str_replace(' ','-',$request->category_name_eng)),
            'category_slug_np'=> str_replace(' ','-',$request->category_name_np),
            'category_icon'=> $request->category_icon,
    
    
    
         ]);
    
    
         $notifiction=array(
            'message'=>'category Inserted  successfully',
            'alert-type'=>'success',
        );
    
        return redirect()->back()->with($notifiction);

 } //end method

  public function CategoryEdit($id){

    $category=Category::findOrFail($id);
    return view('Backend.Category.category_edit',compact('category'));
    
  } //end method

  public function CategoryUpdate(Request $request,$id){
  Category::find($id)->update([
    'category_name_eng'=> $request->category_name_eng,
     'category_name_np'=> $request->category_name_np,
     'category_icon'=> $request->category_icon,



  ]);
  $notifiction=array(
    'message'=>'category updated  successfully',
    'alert-type'=>'success',
);

return redirect()->route('view.category')->with($notifiction);

  } //end method


  public function CategoryDelete($id){
   Category::findOrFail($id)->delete();
   $notifiction=array(
    'message'=>'category delete successfully',
    'alert-type'=>'success',
);

return redirect()->route('view.category')->with($notifiction);
  } //end method


}
