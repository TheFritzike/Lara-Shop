<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn btn-info" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cos cumparaturi <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>
                <!--<button type="button" class="btn btn-info" style="float: right;">-->
                    @if(Auth::check())
                        <span style="text-align: center;">Utilizator: {{ (Auth::user()->email) }}</span>
                        <!--{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}-->
                        <button type="button" class="btn btn-info" style="float: right;">
                            <a href="{{ url('logout')}}" style="color:white;">Deconectare</a> 
                        </button>
                    @else
                        <button type="button" class="btn btn-info" style="float: right;">
                            <a href="{{ url('login')}}" style="color:white;">Atentificare</a> 
                        </button>
                    @endif
                <!--</button>-->
                <div class="dropdown-menu" style="border:1px solid;">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </div>

                        <?php $total = 0 ?>
                        @foreach((array) session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity'] ?>
                        @endforeach

                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info" style="padding-right:10px;">$ {{ $total }}</span></p> <!-- un pic de padding -->
                        </div>
                    </div>

                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail" style="min-width:450px;">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img style="width:100px;height:auto;padding:15px;" src="{{ $details['photo'] }}" />
                                </div> <!-- am fortat local dim imgini -->
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['name'] }}</p>
                                    <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ url('cart') }}" class="btn btn-primary btn-block" style="background-color:#17a2b8;padding:5px;">
                                Vizualizare cos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container page">
    @yield('content')
</div>

@yield('scripts')

</body>
</html>