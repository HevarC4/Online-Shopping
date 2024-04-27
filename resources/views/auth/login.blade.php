<head>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Sign In</h1>
                <input type="email" placeholder="Email" class=" @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" autocomplete="email" autofocus>
                <div>
                    @error('email')
                        <span>
                            <strong class="spam">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input id="password" type="password" placeholder="Password"
                    class="form-control @error('password') is-invalid @enderror" name="password"
                    autocomplete="current-password">
                <div>
                    @error('password')
                        <span>
                            <strong class="spam">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input class="" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="">
                    <button type="submit">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="flex items-center" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">

                <div class="toggle-panel toggle-right">
                    <h1>Welcome, Friend!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <a href="{{ route('register') }}">
                        <button class="hidden" id="register">Sign Up</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
