<!-- login.blade.php -->

@extends('master')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
        <form method="post" action="{{ url('login') }}">
                <div class="card shadow">
                    <div class="car-header bg-success pt-2" style="padding:0!important;">
                        <div class="card-title font-weight-bold text-white text-center" style="background-color:#17a2b8;border-color:#17a2b8;padding:0;margin:0;height:30px;"> 
                            WebShop Exclusivist 
                        </div>
                    </div>

                    <div class="card-body">
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif


                        <div class="form-group">
                            <label for="email"> E-mail </label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Introduceti E-mail" value="{{ old('email') }}"/>
                            {!! $errors->first('email', '<small class="text-danger">:message</small>') !!}
                        </div>

                        <div class="form-group">
                            <label for="password"> Parola </label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Introduceti Parola" value="{{ old('password') }}"/>
                            {!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="card-footer d-inline-block">
                        <button type="submit" class="btn btn-success" style="background-color:#17a2b8;border-color:#17a2b8;"> 
                            Autentificare 
                        </button>
                        <p class="float-right mt-2" > 
                            Nu aveti cont?  
                            <a href="{{ url('user-registration')}}" class="text-success"> 
                                <span  style="color:#17a2b8;">
                                    Inregistrare
                                </span> 
                            </a> 
                        </p>
                    </div>
                    @csrf
                </div>
            </form>
        </div>
    </div>
</div>
@endsection