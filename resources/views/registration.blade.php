<!-- registration.blade.php -->

@extends('master')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
            <form method="post" action=" {{ url('user-store') }} ">
                <div class="card shadow mb-4">
                    <div class="car-header bg-success pt-2" style="padding:0!important;">
                        <div class="card-title font-weight-bold text-white text-center" style="background-color:#17a2b8;border-color:#17a2b8;padding:0;margin:0;height:30px;"> 
                            Adauga cumparator
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
                            <label for="first_name"> Prenume </label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Introduceti prenumele" value="{{ old('first_name') }}"/>
                            {!! $errors->first('first_name', '<small class="text-danger">:message</small>') !!}
                        </div>

                        <div class="form-group">
                            <label for="last_name"> Nume </label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Introduceti numele" value="{{ old('last_name') }}"/>
                            {!! $errors->first('last_name', '<small class="text-danger">:message </small>') !!}
                        </div>

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

                        <div class="form-group">
                            <label for="confirm_password"> Confirmare Parola </label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirmati Parola" value="{{ old('confirm_password') }}">
                            {!! $errors->first('confirm_password', '<small class="text-danger">:message</small>') !!}
                        </div>

                        <div class="form-group">
                            <label for="phone"> Nr. Telefon </label>
                            <input type="phone" name="phone" id="phone" class="form-control" placeholder="Introduceti Nr. Telefon" value="{{ old('phone') }}">
                            {!! $errors->first('phone', '<small class="text-danger">:message</small>') !!}
                        </div>
                    </div>

                    <div class="card-footer d-inline-block">
                        <button type="submit" class="btn btn-success" style="background-color:#17a2b8;border-color:#17a2b8;"> Inregistrare </button>
                        <p class="float-right mt-2"> 
                            Aveti cont?  
                            <a href="{{ url('user-login')}}" class="text-success"> 
                                <span  style="color:#17a2b8;">
                                    Autentificare
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