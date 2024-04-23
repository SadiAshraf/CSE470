<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}?v={{ filemtime(public_path('css/login.css')) }}">
    <title>Login</title>
</head>
<body>
    <h1>LOGIN</h1>
    <div class="login-container">
        
        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="student_id">Student Id</label>
                <input type="text" name="student_id" id="student_id" required>
                <p>
                    @if ($errors->has('login'))
                        <div class="alert alert-danger">
                            {{ $errors->first('login') }}
                        </div>
                    @endif
                </p>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <button class="login-button" type="submit">Login</button>
            </div>
            <p class = "ll">
                Not a user??<br><a href="{{ route('registershow') }}">Sign up Here</a>
            </p>
        </form>

        
   </div>
</body>
</html>