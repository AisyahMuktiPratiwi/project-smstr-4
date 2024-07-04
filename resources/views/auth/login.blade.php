{{-- <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
   
    <link rel="stylesheet" href="style.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: lavender;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: sans-serif;
        }

        .login {
            position: fixed;
            top: 50%;
            left: 45%;
            transform: translate(-30%, -50%);
            background: rgba(146, 69, 17, 0.226);
            padding: 50px;
            width: 270px;
            box-shadow: 0px 0px 25px 10px rgba(146, 69, 17, 0.979);
            border-radius: 15px;
        }

        .avatar {
            font-size: 30px;
            background: #E59866;
            width: 50px;
            height: 50px;
            line-height: 50px;
            position: fixed;
            left: 50%;
            top: 0;
            transform: translate(-50%, -50%);
            text-align: center;
            border-radius: 50%;
        }

        .login h2 {
            text-align: center;
            color: white;
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
            border-bottom: 2px solid white;
            padding: 8px 0;
        }

        .box-login i {
            font-size: 23px;
            color: white;
            padding: 5px 0;
        }

        .box-login input {
            width: 85%;
            padding: 5px 0;
            background: none;
            border: none;
            outline: none;
            color: white;
            font-size: 18px;
        }

        .box-login input::placeholder {
            color: white;
        }

        .btn-login .box-login input:hover {
            background: rgba(10, 10, 10, s 0.5);
        }

        .btn-login {
            margin-left: 10px;
            margin-bottom: 20px;
            background: none;
            border: 1px solid white;
            width: 92.5%;
            padding: 10px;
            color: white;
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
            background-color: rgb(255, 139, 86);
            position: relative;
            overflow: hidden;
        }

    </style>


</head>

<body>
  <div class="login">

    <div class="avatar">
        <i class="fa fa-user"></i>
    </div>

    <h2>Login Form</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="box-login">
            <i class="fas fa-envelope-open-text"></i>
            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>

        <div class="box-login">
            <i class="fas fa-lock"></i>
            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
        </div>

        <button type="submit" name="login" class="btn-login">Login</button>
        <div class="bottom">
            <a href="{{ route('register') }}">Belum Punya Akun?</a>

        </div>
    </form>
</div>

</body>

</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- bootstrap  -->
   
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <!-- for swiper slider  -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/swiper-bundle.min.css')}}">

    <!-- fancy box  -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/jquery.fancybox.min.css')}}">
    <!-- custom css  -->
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
            justify-content: center;
            min-height: 100vh;
            background: #0c0116;
            display: flex;
            align-items: center;
        }
        .form {
            position: relative;
            background: rgba(0, 0, 0, 0.8); /* Opasitas 80% */
            overflow: hidden;
            box-shadow: 50px 50px 50px 50px rgb(87, 47, 29);
            border-radius: 20px;
            padding: 60px 15px;
            width: 270px;
            height: 350px;
            opacity: 70%;
        }
        .form-inner {
            position: absolute;
            top: 50%;
            left: 50%;
            background: #130e0e;
            height: 98%;
            width: 98%;
            opacity: 80%;
            transform: translate(-50%, -50%);
        }

        .content {
            width: 100%;
            padding: 25px;
            height: 100%;
        }

        .form-inner h2 {
            text-align: center;
            padding-top: 35px;
            font-size: 25px;
            color: #d9ff00;
        }

        .input {
            display: block;
            padding: 12px 15px;
            border: 1.5px solid rgb(250, 238, 66);
            outline: none;
            background: #7e2f2f;
            color: white;
            width: 100%;
            left: 50%;
            border-radius: 10px;
            margin-top: 20px;
        }

        .btn {
            margin-top: 40px;
            width: 100%;
            cursor: pointer;
            color: rgb(87, 8, 8);
            border: none;
            font-size: 18px;
            border-radius: 10px;
            transition: 0.4s;
            padding: 12px;
            outline: none;
            background: #f3e303;
        }

        .btn:hover {
            background: #7e2f2f;
            color:#d9ff00
        }

        .form span {
            height: 50%;
            width: 50%;
            position: absolute;
        }

        .form span:nth-child(1) {
            background: #ffda05;
            animation: 5s span1 infinite linear;
            animation-delay: 1s;
            top: 0;
            left: -48%;
        }

        .form span:nth-child(2) {
            background: #00a800;
            bottom: 0;
            right: -48%;
            animation: 5s span2 infinite linear;
        }

        .form span:nth-child(3) {
            background: #ff9100;
            top: 0px;
            animation: 5s span3 infinite linear;
            right: -48%;
        }

        .form span:nth-child(4) {
            animation: 5s span4 infinite linear;
            animation-delay: 1s;
            background: #ff0000;
            bottom: 0;
            right: -48%;
        }

        @keyframes span1 {
            0% {
                top: -48%;
                left: -48%;
            }
            25% {
                top: -48%;
                left: 98%;
            }
            50% {
                top: 98%;
                left: 98%;
            }
            75% {
                top: 98%;
                left: -48%;
            }
            100% {
                top: -48%;
                left: -48%;
            }
        }

        @keyframes span2 {
            0% {
                bottom: -48%;
                right: -48%;
            }
            25% {
                bottom: -48%;
                right: 98%;
            }
            50% {
                bottom: 98%;
                right: 98%;
            }
            75% {
                bottom: 98%;
                right: -48%;
            }
            100% {
                bottom: -48%;
                right: -48%;
            }
        }

        @keyframes span3 {
            0% {
                top: -48%;
                left: -48%;
            }
            25% {
                top: -48%;
                left: 98%;
            }
            50% {
                top: 98%;
                left: 98%;
            }
            75% {
                top: 98%;
                left: -48%;
            }
            100% {
                top: -48%;
                left: -48%;
            }
        }

        @keyframes span4 {
            0% {
                bottom: -48%;
                right: -48%;
            }
            25% {
                bottom: -48%;
                right: 98%;
            }
            50% {
                bottom: 98%;
                right: 98%;
            }
            75% {
                bottom: 98%;
                right: -48%;
            }
            100% {
                bottom: -48%;
                right: -48%;
            }
        }
    </style>
</head>
<body style="background-image: url(frontend/assets/images/menu-bg.png);"
                class="our-menu section bg-light repeat-img">
    
    <form  class="form" method="POST" action="{{ route('login') }}">
       @csrf
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <div class="form-inner">
            <h2>LOGIN</h2>
            <div class="content">
                <input class="input" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> @enderror
                
                <input class="input" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span> @enderror
            <button type="submit" name="login" class="btn">Login</button>
        
            
   
            </div>
            </div>
        </div>
      
    </form>
    
    
    
     
</body>

</html>
