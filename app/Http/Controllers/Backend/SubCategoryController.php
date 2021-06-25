<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $category=Category::orderBy('category_name_eng','ASC')->get();
        $subcategory=SubCategory::latest()->get();
        return view('Backend.category.subcategory_view',compact('subcategory','category'));
    } //end method

    public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_name_eng'=>'required',
            'subcategory_name_np'=>'required',
           
            ],[  
                'category_id.required' =>'Select any category option',
                'subcategory_name_eng.required' =>'Input  Category name in english',
                'subcategory_name_np.required' =>'Input Category name in Nepali',
        
            ]);
            
        
            SubCategory::insert([
                 'category_id'=> $request->category_id,
                'subcategory_name_eng'=> $request->subcategory_name_eng,
                'subcategory_name_np'=> $request->subcategory_name_np,
                'subcategory_slug_eng'=> strtolower(str_replace(' ','-',$request->subcategory_name_eng)),
                'subcategory_slug_np'=> str_replace(' ','-',$request->subcategory_name_np),
        
             ]);
        
        
             $notifiction=array(
                'message'=>' Sub category Inserted  successfully',
                'alert-type'=>'success',
            );
        
            return redirect()->back()->with($notifiction);
    }// end method
     
    public function SubCategoryEdit($id){
        $category=Category::orderBy('category_name_eng','ASC')->get();
        $subcategory=SubCategory::findOrFail($id);
        return view('Backend.Category.subcategory_edit',compact('subcategory','category'));
        
    } //end method


       public function SubCategoryUpdate(Request $request){
        $subcat_id=$request->id;

        SubCategory::findOrFail($subcat_id)->update([
            'category_id'=> $request->category_id,
           'subcategory_name_eng'=> $request->subcategory_name_eng,
           'subcategory_name_np'=> $request->subcategory_name_np,
           'subcategory_slug_eng'=> strtolower(str_replace(' ','-',$request->subcategory_name_eng)),
           'subcategory_slug_np'=> str_replace(' ','-',$request->subcategory_name_np),
   
        ]);
   
   
        $notifiction=array(
           'message'=>' Sub category Updated  successfully',
           'alert-type'=>'success',
       );
       return redirect()->route('view.subCategory')->with($notifiction);

    } // end method

    public function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();
        $notifiction=array(
            'message'=>' Sub category Deleted  successfully',
            'alert-type'=>'success',
        );
    
        return redirect()->route('view.subCategory')->with($notifiction);
    } //end method


    //sub sub category


    public function SubSubCategoryView(){
        $category=Category::orderBy('category_name_eng','ASC')->get();
        $subsubcategory=SubSubCategory::latest()->get();
        return view('Backend.Category.subsubcategory_view',compact('subsubcategory','category'));   
    } //end method


    public function GetSubCategory($category_id){
        $subcat=SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_eng','ASC')->get();
        return json_encode($subcat);

    }//end method
   

    public function GetSubSubCategory($subcategory_id){
  $subsubcat=SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_eng','ASC')->get();
   return json_encode($subsubcat);
    }
    

    public function SubSubCategoryStore(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_name_eng'=>'required',
            'subsubcategory_name_np'=>'required',
           
            ],[  
                'category_id.required' =>'Select any category option',
                'subcategory_id.required' =>'Select any category option',
                'subsubcategory_name_eng.required' =>'Input sub sub Category name in english',
                'subsubcategory_name_np.required' =>'Input sub subCategory name in Nepali',
        
            ]);
            
        
            SubSubCategory::insert([
                 'category_id'=> $request->category_id,
                 'subcategory_id'=> $request->subcategory_id,
                'subsubcategory_name_eng'=> $request->subsubcategory_name_eng,
                'subsubcategory_name_np'=> $request->subsubcategory_name_np,
                'subsubcategory_slug_eng'=> strtolower(str_replace(' ','-',$request->subsubcategory_name_eng)),
                'subsubcategory_slug_np'=> str_replace(' ','-',$request->subsubcategory_name_np),
        
             ]);
        
        
             $notifiction=array(
                'message'=>' Sub  sub category Inserted  successfully',
                'alert-type'=>'success',
            );
        
            return redirect()->back()->with($notifiction);
        
    } //end method
    public function SubSubCategoryEdit($id){
        $category=Category::orderBy('category_name_eng','ASC')->get();
        $subcategory=SubCategory::orderBy('subcategory_name_eng','ASC')->get();
        $subsubcategory=SubSubCategory::findOrFail($id);
        return view('Backend.Category.subsubcategory_edit',compact('subcategory','category','subsubcategory'));
    } //end method

  public function SubSubCategoryUpdate(Request $request){
    $subsubcat_id=$request->id;

    SubSubCategory::findOrFail($subsubcat_id)->update([
        'category_id'=> $request->category_id,
        'subcategory_id'=> $request->subcategory_id,
       'subsubcategory_name_eng'=> $request->subsubcategory_name_eng,
       'subsubcategory_name_np'=> $request->subsubcategory_name_np,
       'subsubcategory_slug_eng'=> strtolower(str_replace(' ','-',$request->subsubcategory_name_eng)),
       'subsubcategory_slug_np'=> str_replace(' ','-',$request->subsubcategory_name_np),

    ]);


    $notifiction=array(
       'message'=>' Sub subcategory Updated  successfully',
       'alert-type'=>'success',
   );
   return redirect()->route('view.subsubCategory')->with($notifiction);


  }//end method

    public function SubSubCategoryDelete($id){
        SubSubCategory::findOrFail($id)->delete();
        $notifiction=array(
            'message'=>' Sub  subcategory Deleted  successfully',
            'alert-type'=>'success',
        );
    
        return redirect()->route('view.subsubCategory')->with($notifiction);
    } //end method





}
