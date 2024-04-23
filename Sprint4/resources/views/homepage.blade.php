<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}?v={{ filemtime(public_path('css/homepage.css')) }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>homepage</title>
</head>
<body>
    
    <div class="tab-container">
        <img src="../img.png" alt="Logo" class="logo">
        <div class="options">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    Self study
                </button>
                
                <ul class="dropdown-menu">
                    @foreach ($allcourses as $course)
                        <li><a class="dropdown-item" href="{{ route('go-to-resource',['course_id'=>$course->course_id,'name'=>$name,'student_id'=>$student_id]) }}">{{ $course->course_id }}</a></li>
                    @endforeach
                </ul>
              </div>
                
            </div>
            <div class="welcome-message">
                Welcome, {{$name}}!
            </div>
            <a href={{route('userprofile',['student_id'=>$student_id,'name'=>$name])}}>
                <button class="profile-button">Go to Profile</button>
            </a>

            <form action="{{ route('/') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
            
        </div>
{{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    
    @foreach ($allcourses as $course)
        @php
            $course_content = App\Models\offeredcourse::where('course_id', $course->course_id)->first();
        @endphp
        <div class="">
            <h1>{{ $course_content['course_id'] }}</h1>
            <h5>{{ $course_content['description'] }}</h5>
        </div>
    @endforeach

</body>
</html>
