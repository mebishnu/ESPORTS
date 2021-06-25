@extends('frontend.main_master')
@section('content')
 <diV class="body-content">
     <div class="container">
      <div class="row">
          @include('frontend.common.user_sidebar')
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
          </strong> welcome to ESPORT</h3>
          
          </div>

          </div> 
          <!-- //end col-md-2 -->


      </div> 
      <!-- //end row -->


     </div>

 </diV>


@endsection