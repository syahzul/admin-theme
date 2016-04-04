@extends('layouts.app')

<!-- Main Content -->
@section('content')
    
    <body class="login-page">
        <div class="login-box">
            @include('partials.login_logo')

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="login-box-body">
                <p class="login-box-msg">Reset Password</p>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                    {!! csrf_field() !!}

                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>

                    <div class="row">
                        <div class="col-xs-2">
                        </div><!-- /.col -->
                        <div class="col-xs-8">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
                        </div><!-- /.col -->
                        <div class="col-xs-2">
                        </div><!-- /.col -->
                    </div>
                </form>

                <a href="{{ url('/auth/login') }}">Log in</a><br>
                <a href="{{ url('/auth/register') }}" class="text-center">Register a new membership</a>

            </div><!-- /.login-box-body -->

        </div><!-- /.login-box -->

        @include('auth.scripts')

    </body>

@endsection
