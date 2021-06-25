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
     <h3 class="box-title"> Update Sub Category </h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
       <form method="post" action="{{ route('subcategory.update')}}" >

					@csrf  

					<input type="hidden" name="id" value="{{$subcategory->id}}">
                    <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id"  class="form-control" >
                                    <option value=""  slected="" disabled="">Select SubCategory</option>
                                        @foreach($category as $cat)
                                        
										<option value="{{$cat->id}}" {{$cat->id== $subcategory->category_id ? 'selected':''}}>{{$cat->category_name_eng}}</option>
                                        @endforeach
									</select>
                                    @error('category_id')
                             <span class="text-danger">{{ $message}}</span>
									@enderror
							</div>
                  
					
						   <div class="form-group">
								<h5>  Sub Category Name English <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text"   name="subcategory_name_eng" class="form-control" value="{{$subcategory->subcategory_name_eng}}"  >
									@error('subcategory_name_eng')

                             <span class="text-danger">{{ $message}}</span>

									@enderror
									
									 </div>
							</div>
                            <div class="form-group">
								<h5> Sub  CategoryName Nepali <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text"   name="subcategory_name_np" class="form-control"  value="{{$subcategory->subcategory_name_np}}" >
									@error('subcategory_name_np')

                             <span class="text-danger">{{ $message}}</span>

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