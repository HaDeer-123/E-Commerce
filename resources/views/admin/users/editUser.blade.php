<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="{{asset('adminDashboard/assets/css/bootstrap.css')}}" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="{{asset('adminDashboard/assets/css/font-awesome.css')}}" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="{{asset('adminDashboard/assets/js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="{{asset('adminDashboard/assets/css/custom.css')}}" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    
</head>
<body>
   @include('admin.navbar')
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Customer</h2>   
                        <h5>Welcome Admin , Here You Can Edit Customer. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Customer
                            
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 style="color: rgb(0, 94, 255)">Edit Customer Data</h3>
                                    <form role="form" method="POST" action="{{url('updatetUser',$user->id)}}">
                                        @csrf
                                        <div class="form-group">
                                            <label>#ID</label>
                                            <input class="form-control" name="id" value="{{$user->id}}" />
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Customer Name</label>
                                            <input class="form-control" name="name" value="{{$user->name}}" />
                                        </div>

                                        <div class="form-group">
                                            <label>Customer Email</label>
                                            <input class="form-control" name="email" value="{{$user->email}}" />
                                        </div>

                                        <div class="form-group">
                                            
                                            <input type="submit" class="btn btn-info"
                                             placeholder="Edit Customer Email" />
                                        </div>
                                        
                                    </form>
                                    <br />
                                     
                                    
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
           
                <!-- /. ROW  -->
          
             
                <!-- /. ROW  -->
        </div>
               
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{asset('adminDashboard/assets/js/jquery-1.10.2.js')}}"></script>
    <!-- BOOTSTRAP SCRIPTS -->
  <script src="{{asset('adminDashboard/assets/js/bootstrap.min.js')}}"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="{{asset('adminDashboard/assets/js/jquery.metisMenu.js')}}"></script>
   <!-- MORRIS CHART SCRIPTS -->
   <script src="{{asset('adminDashboard/assets/js/morris/raphael-2.1.0.min.js')}}"></script>
  <script src="{{asset('adminDashboard/assets/js/morris/morris.js')}}"></script>
    <!-- CUSTOM SCRIPTS -->
  <script src="{{asset('adminDashboard/assets/js/custom.js')}}"></script>
   
</body>
</html>