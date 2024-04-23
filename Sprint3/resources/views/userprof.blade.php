<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}?v={{ filemtime(public_path('css/profile.css')) }}">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

    <title>user</title>
</head>
<body>
    
    <div class="tab-container">
        <a href="{{ route('homepage',['student_id'=>$student_id]) }}"> 
        	<img src="https://www.bracu.ac.bd/sites/default/files/resources/media/bracu_logo.png" alt="Logo" class="logo">
    	</a>
        <div class="options">
            </div>
            
            <div class="welcome-message">
                Welcome, {{$name}}!
            </div>
            
            <form action="{{ route('/') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
            
        </div>
{{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
    <table>
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allcourses as $course)
                <tr>
                    <td>{{ $now=$course->course_id }}</td>
                    <td>
                        <a href="{{ route('coursechat', ['course_id' => $now, 'student_id' => $student_id]) }}" class="goto-button">Goto</a>
                        
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <h1>Your Groups</h1>
    <table>
        <tr>
            <th>Group Name</th>
            <th>Course</th>

            <th>Actions</th>
        </tr>
        @php
            $yourGroups = App\Models\create_members::where('student_id', $student_id)->get();
        @endphp
        @foreach ($yourGroups as $group)
            @php
                $groupDetails = App\Models\create_group::where('group_name', $group->group_name)->first();
            @endphp
            <tr>
                <td>{{ $group->group_name }}</td>
                <td>{{ $groupDetails->belongs_to }}</td>

                <td>
                    <a href="{{ route('show_grp_chat', ['name' => $groupDetails->group_name,'student_id'=>$student_id]) }}">goto</a>
                    
                </td>
            </tr>
        @endforeach
    </table>
    
</body>
</html>