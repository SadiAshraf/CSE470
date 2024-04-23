<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/inbox.css') }}">

    <title>personal dm</title>
</head>
<body>
    <div class="tab-container">
        <a href="{{ route('homepage',['student_id'=>$sender_id]) }}"> 
            <img src="https://www.bracu.ac.bd/sites/default/files/resources/media/bracu_logo.png" alt="Logo" class="logo">
            
        </a>
        @php
            $student = App\Models\student::where('student_id', $reciver_id)->first();
        @endphp
            <h1>Send to: {{ $student->name }}</h1>

        <form action="{{ route('/') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
    <div class="chat-container">
        <div class="messages">

            @foreach ($sent as $chat)
                @php
                    $student = App\Models\student::where('student_id', $sender_id)->first();
                @endphp
                @if($chat->sender_id!=$sender_id)
                    <div class="name">
                        <p>{{ $student->name }}</p>
                    </div>
                @else
                    <div class="name">
                        <p>You</p>
                    </div>
                @endif
                <div class="message">
                    <p>{{ $chat['msg'] }}<br><br>                
                </div>
            @endforeach
        </div>
        <form method="POST" action='{{ route('send-dm-msg',['sender_id'=>$sender_id,'reciver_id'=>$reciver_id]) }}'>
            @csrf

            <label for="message">Message:</label>
            <input type="text" id="message" name="message" required>

            <button type="submit">Send Message</button>
        </form>
    </div>
</body>
</html>
