<!DOCTYPE html>
<html lang="en">

<head>
    <title>LOGIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<div class="auth-wrapper">
    <div class="auth-content text-center">
        <div class="card borderless">
            <div class="row align-items-center ">
                <div class="col-md-12">
                    <div class="card-body">
                        <h4 class="mb-3 f-w-400">Sign In</h4>
                        <hr>
                        <form id="formAuthentication" class="mb-3" action="{{ url('/login') }}" method="POST">
                            {!! csrf_field() !!}
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="email" id="Email"
                                    placeholder="Email address">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control" name="password" id="Password"
                                    placeholder="Password">
                            </div>
                            <button class="btn btn-block btn-primary mb-4">Signin</button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/vendor-all.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>


</body>

</html>
