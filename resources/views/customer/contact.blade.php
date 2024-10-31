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
           

                   
            <div class="container-fluid">
                <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Contact Us</span></h2>
                <div class="row px-xl-5">
                    <div class="col-lg-7 mb-5">
                        <div class="contact-form bg-light p-30">
                            <div id="success"></div>
                            <form action="{{url('contactUS')}}" method="post"
                             name="sentMessage" id="contactForm" novalidate="novalidate">
                                @csrf
                                <div class="control-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name"
                                        required="required" data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="email" class="form-control"
                                     id="email" placeholder="Your Email" name="email"
                                        required="required" data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="text" class="form-control" id="subject"
                                     placeholder="Subject" name="subject"
                                        required="required" data-validation-required-message="Please enter a subject" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control" rows="8" id="message"
                                     placeholder="Message" name="message"
                                        required="required"
                                        data-validation-required-message="Please enter your message"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div>
                                    <input type="submit" value="Send Message"
                                     class="btn btn-primary py-2 px-4"
                                     id="sendMessageButton">
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 mb-5">
                        <div class="bg-light p-30 mb-30">
                            <iframe style="width: 100%; height: 250px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                            frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <div class="bg-light p-30 mb-3">
                            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
                            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                            <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
                        </div>
                    </div>
                </div>
            </div>
               
            
           
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




              