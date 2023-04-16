<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="{{ asset('assets/img/logofin.png') }}" type="image/png">
    <title>👩‍💻💻 Darwinflocode 🖥👨‍💻 | Login</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <!-- Meta tag Keywords -->

    <!-- css files -->
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->

    <!-- web-fonts -->
    <link
        href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext"
        rel="stylesheet">
    <!-- //web-fonts -->
</head>

<body>

    <div class="main-bg">
        <!-- title -->
        <h1>¡Bienvenidos!</h1>
        <!-- //title -->
        <!---728x90--->

        <div class="sub-main-w3">
            <div class="image-style">

            </div>
            <!-- vertical tabs -->
            <div class="vertical-tab">
                <div id="section1" class="section-w3ls">
                    <input type="radio" name="sections" id="option1" checked>
                    <label for="option1" class="icon-left-w3pvt"><span class="fa fa-user-circle"
                            aria-hidden="true"></span>Login</label>
                    <article>
                        <form method="POST" action="{{ route('login') }} "autocomplete="off">
                            @csrf
                            <h3 class="legend">Login Here</h3>
                            <div class="input">
                                <span class="fa fa-envelope" aria-hidden="true"></span>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="E-mail" required autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input">
                                <span class="fa fa-key" aria-hidden="true"></span>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="********">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn submit">
                                {{ __('Login') }}
                            </button>
                        </form>
                    </article>
                </div>
              {{--   <div id="section2" class="section-w3ls">
                    <input type="radio" name="sections" id="option2">
                    <label for="option2" class="icon-left-w3pvt"><span class="fa fa-pencil-square"
                            aria-hidden="true"></span>Register</label>
                    <article>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h3 class="legend">Register Here</h3>
                            <div class="input">
                                <span class="fa fa-user-circle" aria-hidden="true"></span>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autofocus placeholder="Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input">
                                <span class="fa fa-envelope-square" aria-hidden="true"></span>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required placeholder="E-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input">
                                <span class="fa fa-key" aria-hidden="true"></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="********">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input">
                                <span class="fa fa-key" aria-hidden="true"></span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="********">
                            </div>
                            <button type="submit" class="btn submit">
                                {{ __('Register') }}
                            </button>
                        </form>
                    </article>
                </div>
                <div id="section3" class="section-w3ls">
                    <input type="radio" name="sections" id="option3">
                    <label for="option3" class="icon-left-w3pvt"><span class="fa fa-lock"
                            aria-hidden="true"></span>Forgot Password?</label>
                    <article>
                        <form action="#" method="post" autocomplete="off">
                            <h3 class="legend last">Reset Password</h3>
                            <p class="para-style">Enter your email address below and we'll send you an email with
                                instructions.</p>
                            <div class="input">
                                <span class="fa fa-envelope-square" aria-hidden="true"></span>
                                <input type="email" placeholder="Email" name="email" required />
                            </div>
                            <button type="submit" class="btn submit last-btn">Reset</button>
                        </form>
                    </article>
                </div> --}}
            </div>
            <!-- //vertical tabs -->
            <div class="clear"></div>
        </div>
        <!---728x90--->
        <!-- copyright -->
        <div class="copyright">
            <h2>&copy; 2023 👩‍💻💻 Darwinflocode 🖥👨‍💻. All rights reserved | Design by
                <a href="#" target="_blank">DarwinFloCode</a>
            </h2>
        </div>
        <!-- //copyright -->
        <!---728x90--->
    </div>


</body>

</html>
