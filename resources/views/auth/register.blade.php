<head>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>هەژمار دروستبکە</h1>
                <br>
                <input type="text" placeholder="ناو" class=" @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" autocomplete="name" autofocus>
                <div>
                    @error('name')
                        <span>
                            <strong class="spam">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input type="email" placeholder="ئیمێڵ" class=" @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" autocomplete="email">
                <div>
                    @error('email')
                        <span>
                            <strong class="spam">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input id="password" type="password" placeholder="وشەی نهێنی "
                    class="form-control @error('password') is-invalid @enderror" name="password"
                    autocomplete="new-password">

                @error('password')
                    <span class="spam">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input id="password_confirmation" type="password" placeholder="دوبارەکردنەوەی وشەی نهێنی "
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation" autocomplete="new-password_confirmation">

                <input type="text" placeholder="ناونیشان" class=" @error('address') is-invalid @enderror"
                    name="address" value="{{ old('address') }}" autocomplete="address">
                <div>
                    @error('address')
                        <span>
                            <strong class="spam">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input type="text" placeholder="ژمارەی مۆبایل" class=" @error('phoneNumber') is-invalid @enderror"
                    name="phoneNumber" value="{{ old('phoneNumber') }}" autocomplete="phoneNumber">
                <div>
                    @error('phoneNumber')
                        <span>
                            <strong class="spam">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit">
                    {{ __('خۆت تۆمار بکە') }}
                </button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1> ! بەخێر بێیتەوە</h1>
                    <p>زانیارییە کەسییەکانت بنووسە بۆ بەکارهێنانی هەموو تایبەتمەندییەکانی ماڵپەڕەکە</p>
                    <a href="{{ route('login') }}">
                        <button class="hidden" id="register">چوونە ژوورەوە</button>
                    </a>
                </div>
            </div>

        </div>
    </div>

</body>
