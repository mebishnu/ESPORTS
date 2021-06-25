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
     <h3 class="box-title"> Add Brand </h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
       <form method="post" action="{{ route('brand.update')}}" enctype="multipart/form-data" >
					@csrf
					<input type="hidden" name="id" value="{{$brand->id}}">
                    <input type="hidden" name="old_image" value="{{$brand->brand_image}}">
						   <div class="form-group">
								<h5>Brand Name English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text"   name="brand_name_eng" class="form-control" value="{{ $brand->brand_name_eng}}"  >
									@error('brand_name_eng')

                             <span class="text-danger">{{ $message}}</span>

									@enderror
									
									 </div>
							</div>
                            <div class="form-group">
								<h5>Brand Name Nepali <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text"   name="brand_name_np" class="form-control" value="{{ $brand->brand_name_np}}"  >
									@error('brand_name_np')

                             <span class="text-danger">{{ $message}}</span>

									@enderror
									
									 </div>
							</div>
                            <div class="form-group">
								<h5> Brand Image <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="file"   name="brand_image" class="form-control"  >
									@error('brand_image')
                                     <span class="text-danger">{{$message}}</span>

									@enderror
									
									 </div>
							</div>
	
						<div class="text-xs-right">
						<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update"></input>
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