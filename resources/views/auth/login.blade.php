<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login Panel : </title>
    <meta name='generator' content='CRUDBooster' />
    <meta name='robots' content='noindex,nofollow' />
    <link rel="shortcut icon" href="https://larasalesv2.test/vendor/crudbooster/assets/logo_crudbooster.png">

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('vendor') }}/crudbooster/assets/adminlte/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('vendor') }}/crudbooster/assets/adminlte/dist/css/AdminLTE.min.css" rel="stylesheet"
        type="text/css" />

    <link rel='stylesheet' href='{{ asset('vendor') }}/crudbooster/assets/css/main.css' />
    <style type="text/css">
        .login-page,
        .register-page {
            background: #dddddd url('{{ asset('vendor') }}/background.jpeg');
            color: #ffffff !important;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        .login-box,
        .register-box {
            margin: 2% auto;
        }

        .login-box-body {
            box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.8);
            background: rgba(255, 255, 255, 0.9);
            color: #666666 !important;
        }

        html,
        body {
            overflow: hidden;
        }
    </style>
</head>

<body class="login-page">

    <div class="login-box">
        <div class="login-logo">
            <a href="https://larasalesv2.test">
                <img title='WIM' src='{{ asset('vendor') }}/logo_elimspro.png'
                    style='max-width: 100%;max-height:150px' />
            </a>

        </div>
        <div class="login-box-body">

            <p class='login-box-msg' style="font-size: 18px;font-weight: bold;color:#3c8dbc;">Test Skill Elimspro</b>
            <p class='login-box-msg'>Silahkan login</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group has-feedback">
                    <input autocomplete='off' type="text" class="form-control" name='email' value="" required
                        placeholder="Email" />
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input autocomplete='off' type="password" class="form-control" name='password' required
                        placeholder="Password" />
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div style="margin-bottom:10px" class='row'>
                    <div class='col-xs-12'>
                        <button type="submit" class="btn btn-primary btn-block btn-flat"><i class='fa fa-lock'></i>
                            Masuk</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('vendor') }}/crudbooster/assets/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.4.1 JS -->
    <script src="{{ asset('vendor') }}/crudbooster/assets/adminlte/bootstrap/js/bootstrap.min.js" type="text/javascript">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr["error"]("{!! $error !!}")
            </script>
        @endforeach
    @endif

    <script>
        if ("{{ Session::get('success') }}") {
            toastr["success"]("{!! Session::get('success') !!}")
        }
        if ("{{ Session::get('warning') }}") {
            toastr["warning"]("{!! Session::get('warning') !!}")
        }
        if ("{{ Session::get('error') }}") {
            toastr["error"]("{!! Session::get('error') !!}")
        }

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
</body>

</html>
