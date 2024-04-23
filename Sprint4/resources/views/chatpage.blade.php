<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/chatpage.css') }}?v={{ filemtime(public_path('css/chatpage.css')) }}">
    <title>Student Chat</title>
</head>
<body>
    <div class="tab-container">
        <a href="{{ route('homepage',['student_id'=>$student_id]) }}"> 
            <img src="../img.png" alt="Logo" class="logo">
        </a>
        <h1>{{ $course_id }}</h1>

        <form action="{{ route('/') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
        
    </div>
    <div class="container">
        <div class="chat-messages">
            @foreach ($chats as $chat)
                @php
                    $student = App\Models\Student::where('student_id', $chat['student_id'])->first();
                @endphp

                <div class="message">
                    <div class="sender-info">
                        <p class="sender-name">
                            @if ($student->student_id != $student_id)
                                {{ $student->name }}
                            @else
                                You
                            @endif
                        </p>
                        <p class="message-content">{{ $chat['msg'] }}</p>
                    </div>
                    <div class="message-actions">
                        @if ($student->student_id != $student_id && $chat['type'] == 'req')
                            <a href='{{ route('create-grp',['member1'=>$student_id,'member2'=>$student->student_id,'course_id'=>$course_id])}}' class="btn btn-primary">Group Request</a>
                        @elseif ($student->student_id == $student_id && $chat['type'] == 'req')
                            <button class="btn btn-primary">Group Request</button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="student-list">
            @php
                $students = App\Models\enrolledStudents::where('course_id', $course_id)->get();
            @endphp
            @foreach ($students as $student)
                @php
                    $studentName = App\Models\Student::where('student_id', $student->student_id)->first();
                @endphp
                @if ($studentName && $studentName->student_id != $student_id)
                    <p class="student-name">
                        <a href="{{ route('inbox', ['sender_id'=>$student_id ,'reciver_id' => $student->student_id]) }}" class="inbox-btn">{{ $studentName->name }}</a>
                    </p>
                @endif
            @endforeach
        </div>
    </div>

    <form class="send-message-form" method="POST" action='{{ route('sendmsg',['student_id'=>$student_id,'course_id'=>$course_id]) }}'>
        @csrf
        <label for="message">Message:</label>
        <input type="text" id="message" name="message" required>
        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>

    <form class="send-request-form" action='{{ route('grpreq',['student_id'=>$student_id,'course_id'=>$course_id]) }}' method="POST">
        @csrf
        <label for="request">Group Request:</label>
        <input type="text" id="request" name="request" required>
        <button type="submit" class="btn btn-primary">Send Request</button>
    </form>

    <div class='student-list-container'>
        
        
    </div>
</body>
</html>
