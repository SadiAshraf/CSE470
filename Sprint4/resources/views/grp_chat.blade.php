<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Group Chat</title>

    <link rel="stylesheet" href="{{ asset('css/grpchat.css') }}">
</head>
<body>
    <div class="tab-container">
        <a href="{{ route('homepage',['student_id'=>$student_id]) }}"> 
            <img src="../img.png" alt="Logo" class="logo">
        </a>
        <h1>{{ $grp }}</h1>
        

        <form action="{{ route('/') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
        
    </div>
    <div class="messages">
        @foreach ($chats as $chat)
            @php
                $student = App\Models\Student::where('student_id', $chat['sent_by'])->first();
            @endphp

            
                @if ($student->student_id != $student_id)
                    <div class="name">
                        <p>{{ $student->name }}:</p>
                    </div>
                @else
                    <div class="name">
                        <p>You:</p>
                    </div>
                @endif
                    <div class="message">
                        <p>{{ $chat['msg'] }}</p>
                    </div>
        @endforeach
    </div>

    <form method="POST" action='{{ route('add_grp_msg',['student_id'=>$student_id,'name'=>$grp]) }}'>
        @csrf
        <input type="text" id="message" name="message" required placeholder="Type your message...">
        <button type="submit">Send</button>
    </form>
</body>
</html>
