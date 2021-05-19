<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller
{
 public function index(){
     return view('frontend.index');
 } 


 public function UserLogout(){
     Auth::logout();
     return Redirect()->route('login');
 }
    public function UserProfile(){
  $id=Auth::user()->id;
  $user=User::find( $id);
  return view('frontend.profile.user_profile',compact('user'));

    }
   
    public function UserProfileStore(Request $request){
        $data=User::find(Auth::user()->id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;


        if($request->file('profile_photo_path')){
            $file=$request->file('profile_photo_path');
            $filename= date('YmdHi').$file->getClientOriginalName() ;
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path']=$filename;
        }
        $data->save();
        $notifiction=array(
            'message'=>'User profile update successfully',
            'alert-type'=>'success'
        );

        return redirect()->route('dashboard')->with($notifiction);

    }
    
    public function UserChangePassword(){
        
        $user=User::find(Auth::user()->id);
      
        return view('frontend.profile.change_password',compact('user'));   
    }
   
     public function UserProfileUpdate(Request $request){

        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword=Auth::user()->password;
        if(Hash::check($request->current_password, $hashedPassword)){
         $user=User::find(Auth::id());
         $user->password=Hash::make($request->password);
         $user->save();
         Auth::logout();

         return redirect()->route('user.logout');

        }
        else{
            return redirect()->back();
        }
     }
}
