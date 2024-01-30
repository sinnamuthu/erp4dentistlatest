@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">

@endsection

@section('content')

<style>
.row{margin-left:-1.625rem;margin-right:-1.625rem}
  </style>
<!-- register -->
<div class="container-fluid" >
        <div class="row">
        <div class="col-md-6 bg-blue d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('assets/img/login/erpleft.png') }}'); height: 100vh; background-size: cover; background-position: left; ">
        </div>
        <div class="col-md-6 bg-white d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('assets/img/login/erpright.png') }}'); background-size: contain;">
            <div class="login-form text-center">
                <img class="erpimg" src="/assets/img/login/erplogos.png" alt="">
                    <br>
                
                    <h2 class="welcome-text">Welcome </h2>
                    <p class="login-text">PLEASE LOGIN TO ADMIN DASHBOARD</p>

                    <!-- Error message alert -->
                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {!! implode('',$errors->all('<li>:message</li>')) !!}
                </div>
                @endif
    
                    <form id="formAuthentication" class="mb-3" action="{{ '/authenticate' }}" method="POST">
                        @csrf
                        <div class="form-group">
                         <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email" autofocus>
                        </div><br>

                        <div class="form-group">
                         <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                        </div><br>

                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- /Register -->
  </div>
</div>
</div>
@endsection
