@if( Auth::user()->user_type =='admin')
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Binary admin</a> 
        </div>
    <div style="color: white;
    padding: 15px 50px 5px 50px;
    float: right;
    font-size: 16px;"> 
    {{ Auth::user()->name }} &nbsp; 
    <a href="{{route('logout')}}" class="btn btn-danger square-btn-adjust">Logout</a>
 </div>
    </nav>   
       <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="{{asset('adminDashboard/assets/img/find_user.png')}}" class="user-image img-responsive"/>
                </li>
            
                
                <li>
                    <a class="active-menu"  href="index.html"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                </li>
                 <li>
                    <a  href="{{route('showUsers')}}"><i class="fa fa-user fa-3x"></i> Users</a>
                </li>
                <li>
                    <a  href="{{route('showCategory')}}"><i class="fa fa-list fa-3x"></i> Categories </a>
                </li>
                       <li  >
                    <a   href="{{route('showProduct')}}"><i class="fa fa-bar-chart-o fa-3x"></i> Products </a>
                </li>	
                  <li  >
                    <a  href="{{route('showOrder')}}"><i class="fa fa-table fa-3x"></i> Orders </a>
                </li>
                <li  >
                    <a  href="{{route('showCoupon')}}"><i class="fa fa-edit fa-3x"></i> Coupons  </a>
                </li>
                <li  >
                    <a  href="{{route('showReview')}}"><i class="fa fa-star fa-3x"></i> Reviews   </a>
                </li>
                <li  >
                    <a  href="{{route('showPayment')}}"><i class="fa fa-credit-card fa-3x"></i> Payments    </a>
                </li>
                				
                
                            
               
                        
                          
            </ul>
           
        </div>
        
    </nav>  
@endif