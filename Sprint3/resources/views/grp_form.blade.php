<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/grp_form.css') }}?v={{ filemtime(public_path('css/grp_form.css')) }}">

    <title>Create Group</title>
</head>
<body>
    <div class="tab-container">

        <a href="{{ route('homepage',['student_id'=>$member1]) }}"> 
        	<img src="https://www.bracu.ac.bd/sites/default/files/resources/media/bracu_logo.png" alt="Logo" class="logo">
    	</a>

        <form action="{{ route('/') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
        
    </div>
    <div class="group_form">
        <h1>Create Group</h1>
        <p>Member 1: {{ $member1 }}</p>
        <p>Member 2: {{ $member2 }}</p>
        <p>Course ID: {{ $course_id }}</p>
        <form action="{{ route('submit-name',['member1'=>$member1,'member2'=>$member2,'course_id'=>$course_id]) }}" method="POST">
            @csrf

            <label for="group_name">Group Name:</label>
            <input type="text" id="group_name" name="group_name" required>

            @if($success === false)
                <p>Group name already in use</p>
            @endif

            <button type="submit">Create Group</button>
        </form>
    </div>
</body>
</html>
