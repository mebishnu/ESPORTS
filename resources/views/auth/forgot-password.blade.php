@extends('frontend.main_master')
@section('content')

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>forget password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Forget Password</h4>
	
    
    <form method="POST" action="{{ route('password.email') }}">
            @csrf
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input  id="email" type="email"  name="email"  class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
	  	
		
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
	</form>	

</div>

<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
   @include('frontend.body.brands')


@endsection