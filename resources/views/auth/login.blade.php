<head>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>چوونە ژوورەوە</h1>
                <br>
                <input type="email" placeholder="ئیمێڵ" class=" @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" autocomplete="email" autofocus>
                <div>
                    @error('email')
                        <span>
                            <strong class="spam">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input id="password" type="password" placeholder="وشەی نهێنی"
                    class="form-control @error('password') is-invalid @enderror" name="password"
                    autocomplete="current-password">
                <div>
                    @error('password')
                        <span>
                            <strong class="spam">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <br>
                <div class="">
                    <button type="submit">
                        {{ __('چوونە ژوورەوە') }}
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
                    <h1>! بەخێربێیت هاوڕێ</h1>
                    <p>زانیارییە کەسییەکانت بنووسە بۆ بەکارهێنانی هەموو تایبەتمەندییەکانی ماڵپەڕەکە</p>
                    <a href="{{ route('register') }}">
                        <button class="hidden" id="register">خۆت تۆمار بکە</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
