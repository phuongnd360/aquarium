<!DOCTYPE html>
<html lang="en">

<head>
    <title>XANH TUOI TROPICAL FISH CO.,LTD - XANH TUOI AQUARIUM</title>
    <link rel="icon" type="image/png" sizes="192x192" href="img/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public/backend') }}/css/login.css">

</head>

<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="{{ asset('public/backend') }}/img/logo-xt.png" class="brand_logo" alt="Logo">
                    </div>
                    @if($message = Session::get('danger'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> {!! $message !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form id="frm-login" class="form-horizontal" role="form" method="post" action="{{route('backend.users.login')}}" accept-charset="utf-8">
                        @csrf

                        <div class="form-group">
                            <!--  <label for="username" class="col-md-3 control-label">Username:</label> -->
                            <div class="col">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- <label for="password" class="col-md-3 control-label">Password:</label> -->
                            <div class="col">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center ">
                            <button type="submit" class="btn login_btn">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        $(".alert-danger").fadeTo(2000, 500).slideUp(2000, function() {
           $(".alert-danger").slideUp(2000)
       });
    </script>
    <script>
        if ($("#frm-login").length > 0) {
            $("#frm-login").validate({
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true,
                    },
                },
                messages: {
                    username: {
                        required: "{{trans('validation.error_username_required')}}",
                    },
                    password: {
                        required: "{{trans('validation.error_password_required')}}",
                    },
                },

                errorElement: 'div',
                errorClass: 'error',
                errorPlacement: function(error, element) {
                    if (element.parent('.input-group-append').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }

            })
        }
    </script>
</body>
</html>