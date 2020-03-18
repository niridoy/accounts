<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task Management System</title>

       <!-- GLOBAL MAINLY STYLES-->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('css/themify-icons.css')}}" rel="stylesheet" />
        <!-- THEME STYLES-->
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
         <!-- PAGE LEVEL STYLES-->
        <link href="{{asset('css/auth-light.css')}}" rel="stylesheet" />

    </head>
    <title>Task Management System</title>

    <body class="bg-silver-300">
        <div class="content">
            <div class="brand">
                <a class="link" href="index.html">Task Manager</a>
            </div>
            <form id="register-form" method="POST" action="{{ route('register') }}" method="POST">
                <h2 class="login-title">Sign Up</h2>
                @csrf
                @method('POST')
                <div class="form-group @error('name') has-error @enderror">
                    <input class="form-control" type="text" name="name" placeholder="Enter Name">
                    @error('name')
                        <span class="help-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group @error('mobile') has-error @enderror">
                    <input class="form-control" type="text" name="mobile" placeholder="Enter Mobile">
                    @error('mobile')
                        <span class="help-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group @error('email') has-error @enderror">
                    <input class="form-control" type="email" name="email" placeholder="Enter Email" autocomplete="off">
                    @error('email')
                    <span class="help-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group @error('password') has-error @enderror">
                    <input class="form-control" id="password" type="password" name="password" placeholder="Enter Password">
                    @error('password')
                    <span class="help-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Enter Confirm Password">
                </div>
                <div class="form-group text-left">
                    <label class="ui-checkbox ui-checkbox-info">
                        <input type="checkbox" name="agree">
                        <span class="input-span"></span>I agree the terms and policy</label>
                </div>
                <div class="form-group">
                    <button class="btn btn-info btn-block" type="submit">Sign up</button>
                </div>
                <div class="social-auth-hr">
                    <span>Or Sign up with</span>
                </div>
                <div class="text-center social-auth m-b-20">
                    <a class="btn btn-social-icon btn-twitter m-r-5" href="javascript:;"><i class="fa fa-twitter"></i></a>
                    <a class="btn btn-social-icon btn-facebook m-r-5" href="javascript:;"><i class="fa fa-facebook"></i></a>
                    <a class="btn btn-social-icon btn-google m-r-5" href="javascript:;"><i class="fa fa-google-plus"></i></a>
                    <a class="btn btn-social-icon btn-linkedin m-r-5" href="javascript:;"><i class="fa fa-linkedin"></i></a>
                    <a class="btn btn-social-icon btn-vk" href="javascript:;"><i class="fa fa-vk"></i></a>
                </div>
                <div class="text-center">Already a member?
                    <a class="color-blue" href="login.html">Login here</a>
                </div>
            </form>


        </div>
        <!-- BEGIN PAGA BACKDROPS-->
        <div class="sidenav-backdrop backdrop"></div>
        <div class="preloader-backdrop">
            <div class="page-preloader">Loading</div>
        </div>

        <!-- CORE PLUGINS -->
    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/popper.min.js')}}" type="text/javascript"></script>
    <script src=".{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="{{asset('js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{asset('js/theme_app.js')}}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>

     <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    </body>
</html>
