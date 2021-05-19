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
          <<a href="{{ route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
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
          <h3 class="text-center"><span class="text-danger">hi...</span> <strong>
          {{ Auth::user()->name}}
          </strong> update your profile</h3>

          <div class="card-body">
           <form method="post" action="{{ route('user.profile.store')}}" enctype="multipart/form-data"  >
           @csrf

           <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Name <span></span></label>
		    <input   type="text" name="name" class="form-control " value="{{ $user->name}}"  >
        </div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email <span></span></label>
		    <input   type="email" name="email" class="form-control " value="{{ $user->email}}"  >
        </div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">phone <span></span></label>
		    <input   type="text" name="phone" class="form-control " value="{{ $user->phone}}"  >
        </div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">User image <span></span></label>
		    <input   type="file" name="profile_photo_path" class="form-control "   >
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