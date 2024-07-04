<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Lezato|Regis</title>
    <link rel="stylesheet" href="style.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <!-- for swiper slider  -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/swiper-bundle.min.css')}}">

    <!-- fancy box  -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/jquery.fancybox.min.css')}}">
    <!-- custom css  -->
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
    <style>
       

        .login {
            position: fixed;
            top: 50%;
            left: 45%;
            transform: translate(-30%, -50%);
            background: rgba(146, 69, 17, 0.226);
            padding: 50px;
            width: 400px;
            box-shadow: 0px 0px 25px 10px rgba(146, 69, 17, 0.979);
            border-radius: 15px;
        }

        .avatar {
            font-size: 30px;
            background: rgb(216, 158, 49);
            width: 50px;
            height: 50px;
            line-height: 50px;
            position: fixed;
            left: 50%;
            top: 0;
            transform: translate(-50%, -50%);
            text-align: center;
            border-radius: 50%;
            opacity: 50%;
        }

        .login h2 {
            text-align: center;
            color: rgb(255, 251, 0);
            font-size: 30px;
            font-family: sans-serif;
            letter-spacing: 3px;
            padding-top: 0;
            margin-top: -20px;
        }

        .box-login {
            display: flex;
            justify-content: space-between;
            margin: 10px;
            border-bottom: 2px solid rgb(255, 238, 0);
            padding: 8px 0;
        }

        .box-login i {
            font-size: 23px;
            color: rgb(255, 196, 0);
            padding: 5px 0;
        }

        .box-login input {
            width: 85%;
            padding: 5px 0;
            background: none;
            border: none;
            outline: none;
            color: rgb(255, 208, 0);
            font-size: 18px;
        }

        .box-login input::placeholder {
            color: rgb(238, 255, 0);

        }

        .btn-login .box-login input:hover {
            background-color:brown;
        }

        .btn-login {
            margin-left: 10px;
            margin-bottom: 20px;
            background: none;
            border: 1px solid rgb(255, 251, 0);
            width: 92.5%;
            padding: 10px;
            color: rgb(255, 217, 0);
            font-size: 18px;
            letter-spacing: 3px;
            cursor: pointer;
        }

        .btn-login:hover {
            background: rgba(12, 30, 15, 0.5);
        }

        .bottom {
            margin-left: 10px;
            margin-right: 10px;
            display: flex;
            justify-content: space-between;
        }

        .bottom a {
            color: white;
            font-size: 15px;
            text-decoration: none;
        }

        .bottom a:hover {
            text-decoration: underline;
        }

        .container {
            width: 100%;
            height: 100vh;
            background-color: rgb(228, 173, 70);
            position: relative;
            overflow: hidden;
            opacity: 50%;
        }


    </style>


</head>

<body  style="background-image: url(frontend/assets/images/menu-bg.png);">
<div class="login">

    <div class="avatar">
        <i class="fa fa-user"></i>
    </div>

    <h2>Regis Form</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="box-login">
            <i class="fas fa-user"></i>
            <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>

        <div class="box-login">
            <i class="fas fa-envelope-open-text"></i>
            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"> @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>

        <div class="box-login">
            <i class="fas fa-lock"></i>
            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>
        <div class="box-login">
            <i class="fas fa-user-lock"></i>
            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>

       

            <input type="hidden" name="is_admin" value="0">

        <button type="submit" name="register" class="btn-login">Regis</button>
        <div class="bottom" >
            <a href="{{ route('login') }}" style="color:rgb(255, 208, 0)">Sudah Punya Akun?</a>

        </div>
    </form>
</div>


</body>

</html>
