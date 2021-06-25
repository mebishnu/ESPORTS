@extends('admin.admin_master')
@section('admin')
   
<!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		


		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			
		 

			


    <!-- <------- add brand page ------ -->
    <div class="col-12">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title"> Update Category </h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
       <form method="post" action="{{ route('category.update',$category->id)}}" enctype="multipart/form-data" >
					@csrf
					 
						   <div class="form-group">
								<h5> Category Name English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text"   name="category_name_eng" class="form-control"  value="{{$category->category_name_eng}}" >
									@error('category_name_eng')

                             <span class="text-danger">{{ $message}}</span>

									@enderror
									
									 </div>
							</div>
                            <div class="form-group">
								<h5>CategoryName Nepali <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text"   name="category_name_np" class="form-control" value="{{$category->category_name_np}}"  >
									@error('category_name_np')

                             <span class="text-danger">{{ $message}}</span>

									@enderror
									
									 </div>
							</div>
                            <div class="form-group">
								<h5> Category Icon <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text"   name="category_icon" class="form-control" value="{{$category->category_icon}}" >
									@error('category_icon')
                                     <span class="text-danger">{{$message}}</span>

									@enderror
									
									 </div>
							</div>
	
						<div class="text-xs-right">
						<input type="submit" class="btn btn-rounded btn-primary mb-5" value=" Update"></input>
						</div>
					</form>

       </div>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->


         
</div>
<!-- /.col -->






		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  
  <!-- /.content-wrapper -->

@endsection