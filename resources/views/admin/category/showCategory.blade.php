@if( Auth::user()->user_type =='admin')
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
                     <h2>All Shop's Category</h2>   
                        <h5>Welcome Admin , Here All Shop's Category. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Shop's Category
                            <a href="{{route('addCategory')}}" class="btn btn-primary"
                            style="float: right; margin-top:-7px;"
                            >add Category</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Category Name</th>
                                            <th>Category Description</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                            
                                        @foreach ($categories as $category)
                                            <tr class="odd gradeX">
                                                <td><img src="image/{{$category->image}}"
                                                    style="width: 50px"></td>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->description}}</td>
                                                <td>
                                                    <a href="{{url('editCategory',$category->id)}}" 
                                                        class="btn btn-success">Edit</a>
                                                    <a href="{{url('deleteCategory',$category->id)}}" 
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                       
                                        
                                       
                                    </tbody>
                                </table>
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
@endif