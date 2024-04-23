<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\course_content;
use App\Models\offeredcourse;
use Illuminate\Support\Facades\File;

class for_pdf extends Controller
{
     public function showPdf(Request $request)
    {
        $course_id = $request->only('course_id');
        $type = $request->only('type');
        $path = $request->only('path');

        $courseContent = course_content::where('course_id', $course_id['course_id'])
            ->where('type', $type['type'])
            ->where('path', $path['path'])
            ->first();

        if ($courseContent) {
            $filePath = public_path($courseContent->path);
            
            $mimeType = mime_content_type($filePath);

            return Response::make(file_get_contents($filePath), 200, [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"',
            ]);
        } else {
            abort(404, 'File not found');
        }

    
    }

    public function add_course(Request $request)
    {
        $course_id=$request->input('course_id');
        $course_description=$request->input('course_description');

        $admin_id=$request->only('admin_id');

        offeredcourse::create([
            'course_id' => $course_id,
            'description' => $course_description,
        ]);

        return redirect()->route('show-admin', ['admin_id' => $admin_id['admin_id']]);
        
       
    }

    public function add_resource(Request $request)
    {
        $course_id = $request->input('course_id');
        $type = $request->input('type');
        $admin_id = $request->input('admin_id');
    
        if ($request->hasFile('resource_file')) {
            $file = $request->file('resource_file');
            $fileName = $file->getClientOriginalName();
    
            $destinationPath = public_path('contents');
    
            $file->move($destinationPath, $fileName);
    
            course_content::create([
                'course_id' => $course_id,
                'type' => $type,
                'path' => 'contents/' . $fileName, 
            ]);
        }
    
        return redirect()->route('show-admin', ['admin_id' => $admin_id]);
    }

    public function resource(Request $request)
    {
        $course_id = $request->input('course_id');
        $student_id = $request->input('student_id');

        $name = $request->input('name');

        
        return view('resources',['course_id'=>$course_id,'name'=>$name,'student_id'=>$student_id]);
    }
    

    


}
