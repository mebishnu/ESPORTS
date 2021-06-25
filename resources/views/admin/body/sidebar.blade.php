@php
$prefix=Request::route()->getPrefix();
$route=Route::current()->getName();

@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>ESPORTS</b> Admin</h3>
					 </div>
				</a>
			</div>

        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{ ($route=='dashboard')? 'active':''}}">
          <a href="{{ url('/admin/dashboard')}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview {{ ($prefix=='/brand')? 'active':''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route=='all.brand')? 'active':''}}"><a href="{{route('all.brand')}}"><i class="ti-more"></i>All Brands</a></li>
  
            
          </ul>
        </li>



        <li class="treeview {{ ($prefix=='/category')? 'active':''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route=='view.category')? 'active':''}}"><a href="{{route('view.category')}}"><i class="ti-more"></i>All Category</a></li>
            <li class="{{ ($route=='view.subCategory')? 'active':''}}"><a href="{{route('view.subCategory')}}"><i class="ti-more"></i>All sub Category</a></li>
            <li class="{{ ($route=='view.subsubCategory')? 'active':''}}"><a href="{{route('view.subsubCategory')}}"><i class="ti-more"></i>All Sub sub Category</a></li>

            
          </ul>
        </li>
		
        <li class="treeview {{ ($prefix=='/product')? 'active':''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route=='add-product')? 'active':''}}"><a href="{{ route('add-product')}}"><i class="ti-more"></i>Add products</a></li>
            <li class="{{ ($route=='manage-product')? 'active':''}}"><a href="{{route('manage-product')}}"><i class="ti-more"></i>Manage products</a></li>
          
          </ul>
        </li> 	
        <li class="treeview {{ ($prefix=='/slider')? 'active':''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Sliders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route=='manage-slider')? 'active':''}}"><a href="{{route('manage-slider')}}"><i class="ti-more"></i>Manage Slider</a></li>
          </ul>
        </li>	  


        <li class="treeview {{ ($prefix=='/coupons')? 'active':''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Coupons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route=='manage-coupons')? 'active':''}}"><a href="{{route('manage-coupons')}}"><i class="ti-more"></i>Manage Coupons</a></li>
  
            
          </ul>
        </li>


        <li class="treeview {{ ($prefix=='/shipping')? 'active':''}}">
          <a href="#">
            <i data-feather="file"></i> <span>Shipping Area</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route=='manage-division')? 'active':''}}"><a href="{{route('manage-division')}}"><i class="ti-more"></i>Ship Division</a></li>
            <li class="{{ ($route=='manage-district')? 'active':''}}"><a href="{{route('manage-district')}}"><i class="ti-more"></i>Ship District</a></li>
            <li class="{{ ($route=='manage-state')? 'active':''}}"><a href="{{route('manage-state')}}"><i class="ti-more"></i>Ship state</a></li>
  
            
          </ul>
        </li>
		 
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview {{ ($prefix=='/orders')? 'active':''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route=='pending-orders')? 'active':''}}"><a href="{{route('pending-orders')}}"><i class="ti-more"></i>Pending Orders</a></li>
            <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}"><a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Confirmed Orders</a></li>

            <li class="{{ ($route == 'processing-orders')? 'active':'' }}"><a href="{{ route('processing-orders') }}"><i class="ti-more"></i>Processing Orders</a></li>
    
          <li class="{{ ($route == 'picked-orders')? 'active':'' }}"><a href="{{ route('picked-orders') }}"><i class="ti-more"></i> Picked Orders</a></li>
    
          <li class="{{ ($route == 'shipped-orders')? 'active':'' }}"><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i> Shipped Orders</a></li>    
         <li class="{{ ($route == 'delivered-orders')? 'active':'' }}"><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i> Delivered Orders</a></li>
    
      <li class="{{ ($route == 'cancel-orders')? 'active':'' }}"><a href="{{ route('cancel-orders') }}"><i class="ti-more"></i> Cancel Orders</a></li> 
          </ul>
        </li>
		
		<li class="treeview {{ ($prefix=='/reports')? 'active':''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>All Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all-reports')? 'active':'' }}"><a href="{{ route('all-reports') }}"><i class="ti-more"></i> All Reports</a></li> 
		  </ul>
        </li>  

        <li class="treeview {{ ($prefix=='/alluser')? 'active':''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>All User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all-user')? 'active':'' }}"><a href="{{ route('all-user') }}"><i class="ti-more"></i> All User</a></li> 
		  </ul>
        </li>  

        <li class="treeview {{ ($prefix=='/setting')? 'active':''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Site Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'site-setting')? 'active':'' }}"><a href="{{ route('site-setting') }}"><i class="ti-more"></i>Site Setting</a></li> 
            <li class="{{ ($route == 'seo-setting')? 'active':'' }}"><a href="{{ route('seo-setting') }}"><i class="ti-more"></i>Seo Setting</a></li> 
		  </ul>
        </li>  
		  
        
		  
		
      
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>