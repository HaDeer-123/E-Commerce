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
                     <h2>All Shop's Payment</h2>   
                        <h5>Welcome Admin , Here All Shop's Payment. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Shop's Payment
                           
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Total Order Amount</th>
                                            <th>Payment Method</th>
                                            <th>Payment Satus</th>
                                            <th>Amount</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                            
                                        @foreach ($payment as $payment)
                                            <tr class="odd gradeX">
                                                <td>{{$payment->order->total_amount}}</td>
                                                <td>{{ $payment->payment_method }}</td>
                                                @if ($payment->payment_status=='pending')
                                                    <td style="color:red">{{$payment->payment_status}}</td>
                                                @elseif($payment->payment_status=='completed')
                                                    <td style="color:blue">{{$payment->payment_status}}</td>
                                                @elseif($payment->payment_status=='failed')
                                                    <td style="red">{{$payment->payment_status}}</td>
                                                @endif
                                                
                                                <td>{{ $payment->amount }}</td>
                                                   
                                                <td>
                                                    <a href="{{url('editPayment',$payment->id)}}" 
                                                        class="btn btn-success">Edit</a>
                                                    <a href="{{url('deletePayment',$payment->id)}}" 
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