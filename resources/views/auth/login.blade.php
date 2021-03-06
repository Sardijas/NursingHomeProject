<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/style.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>Home - Nursing Home Mask Initiative</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <script defer src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>
    <script src="../js/SwupOverlayTheme.js"></script>
    <script defer src="../js/swup.js"></script>
</head>

<body>
    <nav class="nav">
        <a href="/"><img class="nav__logo" src="../img/tempLogo.png" alt="Temporary Logo"></a>
        <ul class="nav__links">
            <li><a href="/" class="active">Home</a></li>
            <li><a href="/about" class="not-active">About</a></li>
            <li><a href="/participate" class="not-active">Participate</a></li>
            <li><a href="/resources" class="not-active">Resources</a></li>
            <li><a href="/donate" class="not-active">Donate</a></li>
            <li><a href="/contact" class="not-active">Contact</a></li>
            <li><a href="/register" id="registerButton">Register</a></li>
            <li><a href="/login" id="loginButton">Login</a></li>
        </ul>
        <div class="menu">
            <h4>Menu</h4>
        </div>
    </nav>

    <main class="main-login" id="swup">
        <div class="login">
            <div class="login__title">Login</div>
            <div class="login__text">Fill out the form to login</div>
        </div>

        <form method="POST" action="{{ route('login') }}" class="loginForm">
            @csrf
            <div class="loginEmail">
                <input type="text" id="email" name="email" class="loginEmail__form @error('email') is-invalid @enderror"
                    placeholder="Email" required value="{{ old('email') }}">
                <label for="email" class="loginEmail__label">Email</label>
            </div>

            @error('email')
            <script>
                Swal.fire({
                        icon: "error",
                        title: "Error",
                        text:  '{{$message}}',
                        showClass: {
                            popup: "animate__animated animate__fadeIn animate__faster "
                        },
                        hideClass: {
                            popup: "animate__animated animate__fadeOut animate__faster"
                        },
                        confirmButtonColor: "#ff6961",
                    });
            </script>
            @enderror

            <div class="loginPassword">
                <input type="password" id="password" name="password" placeholder="Password"
                    class="loginPassword__form @error('password') is-invalid @enderror" required
                    value="{{ old('password') }}">
                <label for="password" class="loginPassword__label">Password</label>
            </div>

            @error('password')
            <script>
                Swal.fire({
                        icon: "error",
                        title: "Error",
                        text:  '{{$message}}',
                        showClass: {
                            popup: "animate__animated animate__fadeIn animate__faster "
                        },
                        hideClass: {
                            popup: "animate__animated animate__fadeOut animate__faster"
                        },
                        confirmButtonColor: "#ff6961",
                    });
            </script>
            @enderror

            <div class="rememberMeCheckbox">
                <input type="checkbox" id="remember" class="rememberMeCheckbox__input" name="check" autocomplete="off">
                <label for="remember" class="rememberMeCheckbox__label">
                    <svg viewBox="0,0,50,50" id="checkboxArrow">
                        <path d="M5 30 L 20 45 L 45 5"></path>
                    </svg>
                </label>
                <span class="rememberMeCheckbox__text">Remember Me</span>
            </div>

            <div class="loginContainer">
                <input class="loginContainer__button" type="submit" value="Login">

                @if (Route::has('password.request'))
                <a class="loginContainer__text" href="{{ route('password.request') }}">Forgot Your Password?</a>
                @endif
            </div>

        </form>
    </main>
    <script src="../js/app.js"></script>
</body>

</html>