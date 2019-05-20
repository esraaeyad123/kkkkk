<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
	 <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/Admin/view_users')}}">view users</a></li>
		
       
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Serives</span> <span class="label label-important">2</span></a>
	
      <ul>
        <li><a href="{{ url('/Admin/add-servic')}}">Add Serives</a></li>
		
        <li><a href="{{ url('/Admin/view-servic')}}">View Serives</a></li>
      </ul>
    </li>
     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Workers</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/Admin/Employees/add_worker')}}">Add Workers</a></li>
        <li><a href="{{ url('/Admin/Employees/view_worker')}}">View Workers</a></li>
		  <li><a href="{{ url('/Admin/Employees/days')}}">View days</a></li>
      </ul>
    </li>
	   <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Coupons</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/Admin/coupons/add_coupon')}}">Add coupon</a></li>
        <li><a href="{{ url('/Admin/coupons/view_coupons')}}">View coupon</a></li>
      </ul>
    </li>
	 <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Order</span> <span class="label label-important">2</span></a>
      <ul>
      
        <li><a href="{{ url('/Admin/order/view-orders')}}">View order</a></li>
      </ul>
    </li>
	     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>File CV </span> <span class="label label-important">2</span></a>
      <ul>
       
        <li><a href="{{ url('/Admin/file/view_file')}}">View CV</a></li>
      </ul>
    </li>
  
   
  </ul>
</div>
<!--sidebar-menu-->