<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/error_page.css') }}?v={{ filemtime(public_path('css/error_page.css')) }}">

    <title>Error</title>
</head>
<body>
    <div class="tab-container">

        <a href="{{ route('homepage',['student_id'=>$student_id]) }}"> 
        	<img src="https://www.bracu.ac.bd/sites/default/files/resources/media/bracu_logo.png" alt="Logo" class="logo">
    	</a>

        <form action="{{ route('/') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <h1>{{ $error_msg }}</h1>
    <a href="{{ route('homepage',['student_id'=>$student_id]) }}">Go to home</a>
    
</body>
</html>