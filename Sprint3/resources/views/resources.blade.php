<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}?v={{ filemtime(public_path('css/homepage.css')) }}">

    <title>Resource</title>
</head>
<body>
    <div class="tab-container">
        @if ($name == 'Admin')
            <a href="{{ route('show-admin', ['admin_id' => $student_id]) }}"> 
                <img src="https://www.bracu.ac.bd/sites/default/files/resources/media/bracu_logo.png" alt="Logo" class="logo">
            </a>
        @else
            <a href="{{ route('homepage',['student_id'=>$student_id]) }}"> 
                <img src="https://www.bracu.ac.bd/sites/default/files/resources/media/bracu_logo.png" alt="Logo" class="logo">
            </a>
        @endif
        
        <h1>Resources for {{ $course_id }}</h1>
            
            

            <form action="{{ route('/') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
            
        </div>
{{-- ///////////////////////////////////////////////////////////////////////////////////////////////// --}}

        <h1>Notes</h1>
        @php
            $course_contents = App\Models\course_content::where('course_id', $course_id)
                                ->where('type', 'Notes') 
                                ->get();
        @endphp

        @foreach($course_contents as $content)
            <a href="{{ route('show-pdf',['course_id'=>$content->course_id,'type'=>'notes','path' => $content->path]) }}">
                {{ basename($content->path) }}
            </a><br><br>
        @endforeach
        <br><br>
        <h1>Self test</h1>
        @php
            $course_contents = App\Models\course_content::where('course_id', $course_id)
                                ->where('type', 'test') 
                                ->get();
        @endphp

        @foreach($course_contents as $content)
            <a href="{{ route('show-pdf',['course_id'=>$content->course_id,'type'=>'test','path' => $content->path]) }}">
                {{ basename($content->path) }}
            </a><br><br>
        @endforeach
    

</body>
</html>