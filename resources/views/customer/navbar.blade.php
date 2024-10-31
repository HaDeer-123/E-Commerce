<div class="container-fluid">
        
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">Multi</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            
        </div>
        @if (Route::has('login'))
        @auth
        <div class="col-lg-4 col-6 text-right">
            <h5 class="m-0">HI, {{ Auth::user()->name }} &nbsp;</h5>
            <p class="m-0">Customer Service</p>
            <h5 class="m-0">+012 345 6789</h5>
        </div>
        @else
        <div class="col-lg-4 col-6 text-right">
            
            <p class="m-0">Customer Service</p>
            <h5 class="m-0">+012 345 6789</h5>
        </div>
        @endauth
        @endif
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a> 
            
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
                    @foreach ($categories as $category)
                    <a href="" class="nav-item nav-link">{{$category->name}}</a>
                @endforeach
                    
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                    <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        @if (Route::has('login'))
                        @auth
                        <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                        <a href="{{url('shopProducts')}}" class="nav-item nav-link">Shop</a>
                        <a href="{{url('showWishlist')}}" class="nav-item nav-link">Wishlist</a>
                       
                        <a href="{{url('ShowOrder')}}" class="nav-item nav-link">Orders </a>
                        <a href="{{url('showContactForm')}}" class="nav-item nav-link">Contact  </a>
                        @else
                        <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                        <a href="{{url('shopProducts')}}" class="nav-item nav-link">Shop</a>
                        @endauth
                        @endif

                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        @if (Route::has('login'))
                        @auth
                        <a href="" class="btn px-0">
                            <i class="fas fa-heart text-primary"></i>
                            <span 
                            class="badge text-secondary border border-secondary rounded-circle"
                             style="padding-bottom: 2px;">
                              {{ \App\Models\Review::count('rating') }}
                            </span>
                        </a>
                        <a href="{{url('showCart')}}" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle"
                             style="padding-bottom: 2px;">
                             {{ \App\Models\Cart::where('user_id', Auth::id())->sum('quantity') }}
                            </span>
                        </a>

                        <a href="{{url('showProfileDetails')}}" class="btn px-0 ml-3">
                            <i class="fa fa-user" aria-hidden="true" 
                            style='color:rgb(252, 210, 22)'></i>
                        </a>
                       @else
                       
                       <a href="{{url('login')}}" class="btn btn-primary">
                        Login
                    </a>
                    <a href="{{url('register')}}" class="btn btn-primary">
                        
                        Register
                    </a>
                    @endauth
                    @endif
                    </div>
                </div>
            </nav>
        </div>

       
            
        
    </div>
</div>