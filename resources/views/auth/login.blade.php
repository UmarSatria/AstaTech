<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIGN IN | ASTATECH</title>

    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <!-- Bagian gambar di sebelah kiri -->
                <div class="signin-image">
                    <figure>
                        <img src="images/signin-image.jpg" alt="sign in image">
                    </figure>
                    <a href="{{ route('register') }}" class="signup-image-link" style="color: black; text-decoration: none;">Create an account</a>
                </div>

                <!-- Bagian form login -->
                <div class="signin-form">
                    <h2 class="form-title">Sign in</h2>
                    <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                        @csrf

                        <div class="form-group">
                            <label for="email">
                                <i class="zmdi zmdi-account material-icons-name"></i>
                            </label>
                            <input id="email" type="email" name="email" placeholder="Your Email"
                                class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required
                                autocomplete="email" autofocus />
                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">
                                <i class="zmdi zmdi-lock"></i>
                            </label>
                            <input id="password" type="password" name="password" placeholder="Password"
                                class="@error('password') is-invalid @enderror" required
                                autocomplete="current-password" />
                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="remember" id="remember-me" class="agree-term"
                                {{ old('remember') ? 'checked' : '' }} />
                            <label for="remember-me" class="label-agree-term">
                                <span><span></span></span>Remember me
                            </label>
                        </div>

                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                        </div>
                    </form>

                    <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link text-decoration-none text-dark" style="color: black; text-decoration: none;" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
</body>

</html>
