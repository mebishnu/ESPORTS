@extends('frontend.main_master')
@section('content')

 

 <diV class="body-content">
     <div class="container">
      <div class="row">
          <div class="col-md-2">
          <br>
          <img class="card-img-top" style="border-radius:50%" src=" {{(!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" height="100%" width="100%">
          <br><br>
          <uL class="list-group list-group-flush">
          <a href="{{ route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
          <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
          <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a>
          <a href="{{ route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
          
          </uL>
          
          
          </div> 
          <!-- //end col-md-2 -->
          <div class="col-md-2">

          </div> 
          <!-- //end col-md-2 -->
          <div class="col-md-2">

          </div> 
          <!-- //end col-md-2 -->
          <div class="col-md-6">
          <div class="card">
          <h3 class="text-center"><span class="text-danger"> change password</span> <strong>
         
          </strong> </h3>

          <div class="card-body">
           <form method="post" action="{{ route('user.profile.update')}}"  >
           @csrf

           <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Current Password<span></span></label>
		    <input  id="current_password" type="password"  name="current_password" class="form-control "   >
        </div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">New Password <span></span></label>
		    <input   id="password" type="password" name="password" class="form-control "   >
        </div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">password_confirmation<span></span></label>
		    <input  id="password_confirmation" type="password"name="password_confirmation" class="form-control " value="{{ $user->phone}}"  >
        </div>
       
        <div class="form-group">
		    
		  <button type="submit" class="btn btn-danger">Update</button>
        </div>

           </form>
          
          </div>
          
          </div>

          </div> 
          <!-- //end col-md-2 -->


      </div> 
      <!-- //end row -->


     </div>

 </diV>


@endsection