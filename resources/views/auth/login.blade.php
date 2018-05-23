<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{ url('favicon.ico') }}">

        <title>Signin Template for Bootstrap</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{ url('css/bootstrap-4.1.0.css') }}"crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <style>
            html,
            body {
                height: 100%;
            }

            body {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
            }

            .form-signin {
                width: 100%;
                max-width: 430px;
                padding: 15px;
                margin: auto;
            }
            .form-signin .checkbox {
                font-weight: 400;
            }
            .form-signin .form-control {
                position: relative;
                box-sizing: border-box;
                height: auto;
                padding: 10px;
                font-size: 16px;
            }
            .form-signin .form-control:focus {
                z-index: 2;
            }
            .form-signin input[type="text"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }
            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        </style>
    </head>

    <body class="text-center">
        <form class="form-signin" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <h1 class="h3 font-weight-normal">Searfarers Mighty Credit Cooperative</h1>
            <p class="lead mb-5 ">Your Trusted Partner in Advancing Economic & Quality of Life</p>

            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" id="inputUsername" class="form-control has-error" placeholder="Username" name="username" value="{{ old('username') }}" required autofocus>

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>

            @foreach ($errors->all() as $key => $message)
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endforeach

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; SEAMCO WEB SERVICES 2018</p>
        </form>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ url('js/jquery-3.3.1.js') }}" crossorigin="anonymous"></script>
        <script src="{{ url('js/popper.js') }}" crossorigin="anonymous"></script>
        <script src="{{ url('bootstrap-4.1.0.js') }}" crossorigin="anonymous"></script>
    </body>
</html>
