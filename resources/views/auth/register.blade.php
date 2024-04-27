<head>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Create Account</h1>
                <input type="text" placeholder="Name" class=" @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" autocomplete="name" autofocus>
                <div>
                    @error('name')
                        <span>
                            <strong class="spam">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input type="email" placeholder="Email" class=" @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" autocomplete="email">
                <div>
                    @error('email')
                        <span>
                            <strong class="spam">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input id="password" type="password" placeholder="Password "
                    class="form-control @error('password') is-invalid @enderror" name="password"
                    autocomplete="new-password">

                @error('password')
                    <span class="spam">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input id="password_confirmation" type="password" placeholder="Password confirmation "
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation" autocomplete="new-password_confirmation">

                <input type="text" placeholder="Address" class=" @error('address') is-invalid @enderror"
                    name="address" value="{{ old('address') }}" autocomplete="address">
                <div>
                    @error('address')
                        <span>
                            <strong class="spam">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input type="text" placeholder="Phone Number" class=" @error('phoneNumber') is-invalid @enderror"
                    name="phoneNumber" value="{{ old('phoneNumber') }}" autocomplete="phoneNumber">
                <div>
                    @error('phoneNumber')
                        <span>
                            <strong class="spam">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit">
                    {{ __('Sign Up') }}
                </button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <a href="{{ route('login') }}">
                        <button class="hidden" id="register">Sign In</button>
                    </a>
                </div>
            </div>

        </div>
    </div>

</body>
