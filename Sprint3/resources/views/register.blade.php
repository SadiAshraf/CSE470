<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}?v={{ filemtime(public_path('css/register.css')) }}">

    <title>Registration</title>
</head>
<body>
    <div class="login-container">
        <form class="login-form" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="student_id">Student ID</label>
                    <input type="text" name="student_id" id="student_id" required>
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div>
                    <button class="login-button" type="submit">Register</button>
                </div>
            </form>
    </div>
</body>
</html>
