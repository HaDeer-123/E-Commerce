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
                     <h2>All Shop's Orders</h2>   
                        <h5>Welcome Admin , Here All Shop's Orders. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Shop's Orders
                           
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Customer Products</th>
                                            <th>Total Amount</th>
                                            <th>Shipping Address</th>
                                            <th>Order Status</th>
                                            <th>Payment Status</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                            
                                        @foreach ($orders as $order)
                                            <tr class="odd gradeX">
                                                <td>{{$order->user->name}}</td>
                                                <td><ul>
                                                    @foreach ($order->items as $item)
                                                        <li>
                                                            Product: {{ $item->product->name }} <br>
                                                            Quantity: {{ $item->quantity }} <br>
                                                            Price: {{ $item->price }}
                                                        </li>
                                                    @endforeach
                                                </ul></td>
                                                <td>{{$order->total_amount}}</td>
                                                <td>
                                                    {{ $order->shipping_address }}
                                                   
                                                </td>
                                                
                                                
                                                    @if ($order->order_status == "pending")
                                                    <td style="color:red">{{ $order->order_status }}</td>
                                                    @elseif($order->order_status == "shipped")
                                                    <td style="color:green">{{ $order->order_status }}</td>
                                                    @elseif($order->order_status == "delivered")
                                                    <td style="color:blue">{{ $order->order_status }}</td>
                                                    @elseif($order->order_status == "canceled")
                                                    <td style="color:red">{{ $order->order_status }}</td>
                                                @endif
                                                </td>
                                                
                                                @if ($order->payment_status == "pending")
                                                    <td style="color:red">{{ $order->payment_status }}</td>
                                                    @elseif($order->payment_status == "paid")
                                                    <td style="color:blue">{{ $order->payment_status }}</td>
                                                    
                                                    @elseif($order->payment_status == "failed")
                                                    <td style="color:red">{{ $order->payment_status }}</td>
                                                @endif
                                                <td>
                                                    <a href="{{url('editOrder',$order->id)}}" 
                                                        class="btn btn-success">Edit</a>
                                                    <a href="{{url('deleteOrder',$order->id)}}" 
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