<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="MultiShop/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="MultiShop/lib/animate/animate.min.css" rel="stylesheet">
    <link href="MultiShop/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="MultiShop/css/style.css" rel="stylesheet">

    <style>
        table {
            width: 100%; /* Full width */
            border-collapse: collapse; /* Remove space between borders */
            margin-bottom: 20px; /* Space below the table */
        }
    
        th, td {
            padding: 15px; /* Space inside cells */
            text-align: left; /* Align text to the left */
            border: 1px solid #ddd; /* Light gray border */
        }
    
        th {
            background-color: #f2f2f2; /* Light gray background for headers */
            font-weight: bold; /* Make header text bold */
        }
    
        tr:hover {
            background-color: #f1f1f1; /* Change background on hover */
        }
    
        /* Responsive */
        @media (max-width: 768px) {
            table {
                display: block; /* Stack table on small screens */
                overflow-x: auto; /* Enable horizontal scrolling */
            }
    
            th, td {
                display: block; /* Stack table cells */
                text-align: right; /* Align text to the right */
            }
    
            th {
                text-align: left; /* Left align header */
            }
    
            td {
                text-align: left; /* Left align cell text */
                padding-left: 50%; /* Indent cell text */
                position: relative; /* Position for pseudo-element */
            }
    
            td:before {
                content: attr(data-label); /* Use data-label for pseudo-element */
                position: absolute; /* Position it absolutely */
                left: 10px; /* Position from the left */
                width: 45%; /* Set width */
                padding-right: 10px; /* Space on right */
                white-space: nowrap; /* Prevent line break */
                font-weight: bold; /* Make it bold */
                text-align: left; /* Left align */
            }
        }
    </style>
    
</head>

<body>
    <!-- Topbar Start -->
  


    @include('customer.navbar')
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
           

                   @if ($carts->isEmpty())
                       
                  <h4 style="color:red">No Products Added to Cart!</h4>
                       
                  @else
                    <table>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Total Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($carts as $cart)
                            <tr>
                                <td><img src="image\{{$cart->product->image}}" 
                                    style="width:100%;height:60px"></td>
                                <td>{{$cart->product->name}}</td>
                                <td>{{$cart->product->price}}$</td>
                                <td>{{$cart->quantity * $cart->product->price}}$</td>
                                <td>{{$cart->quantity}} Products</td>
                                <td>
                                    <a href="" class="btn btn-primary"
                                    class="btn btn-primary" data-toggle="modal" 
                            data-target="#orderModal{{$cart->id}}">Order Now</a>
                                    <a href="{{url('deleteProductCart',$cart->id)}}" 
                                        class="btn btn-danger">Cancel</a>
                                </td>
                            </tr>


                            <div class="modal fade" id="orderModal{{$cart->id}}" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel{{$cart->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="orderModalLabel{{$cart->id}}">Order Now</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('createOrder') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $cart->product->id }}">
                                                <div class="form-group">
                                                    <label for="quantity">Quantity</label>
                                                    <input type="number" name="quantity" class="form-control" 
                                                        id="quantity" placeholder="Enter Quantity" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name="price" value={{$cart->product->price}}>
                                                    <label for="shipping_address">Shipping Address</label>
                                                    <input type="text" name="shipping_address" class="form-control" 
                                                        id="shipping_address" placeholder="Enter Shipping Address" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="submit" value="Order Now" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </table>
               
            
           @endif
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="MultiShop/lib/easing/easing.min.js"></script>
    <script src="MultiShop/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="MultiShop/mail/jqBootstrapValidation.min.js"></script>
    <script src="MultiShop/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="MultiShop/js/main.js"></script>
</body>

</html>




              