<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}?v={{ filemtime(public_path('css/admin.css')) }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Admin</title>
</head>
<body>
    <div class="tab-container">
        <img src="../img.png" alt="Logo" class="logo">
        <div class="options">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    All Resources
                </button>
                
                <ul class="dropdown-menu">
                    @php
                        $allcourses = App\Models\offeredcourse::distinct()->pluck('course_id');
                    @endphp
                    {{-- {{ $allcourses }} --}}
                    @foreach ($allcourses as $courseId)
                        <li>
                            <a class="dropdown-item" href="{{ route('go-to-resource', ['course_id' => $courseId, 'name' => 'Admin', 'student_id' => $admin_id]) }}">
                                {{ $courseId }}
                            </a>
                        </li>
                    @endforeach

                </ul>
              </div>
                
            </div>

            <form action="{{ route('/') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
            
        </div>
{{-- /////////////////////////////////////////////////////////////////////////////////////////////// --}}
    <div class="admin-section">
        <h1 class="admin-title">Create a New Offered Course</h1>
        <form class="admin-form" action="{{ route('add-course',['admin_id'=>$admin_id['admin_id']]) }}" method="POST">
            @csrf

            <label for="course_id">Course ID:</label>
            <input type="text" id="course_id" name="course_id" required>

            <label for="course_description">Course Description:</label>
            <textarea id="course_description" name="course_description" rows="4" cols="50" required></textarea>

            <button type="submit">Create Course</button>
        </form>

        <h1 class="admin-title">Add Course Resources</h1>
        <form class="admin-form" action="{{ route('add-resource',['admin_id'=>$admin_id['admin_id']]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="resource_course_id">Course ID:</label>
            <input type="text" id="resource_course_id" name="course_id" required>

            <label for="resource_type">Resource Type:</label>
            <select id="resource_type" name="type" required>
                <option value="test">Test</option>
                <option value="notes">Notes</option>
            </select>

            <label for="resource_file">Resource File:</label>
            <input type="file" id="resource_file" name="resource_file" accept=".pdf,.doc,.docx,.txt" required>

            <button type="submit">Add Resource</button>
        </form>
    </div>
</body>
</html>
