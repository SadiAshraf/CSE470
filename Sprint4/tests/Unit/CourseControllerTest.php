<?php

use Tests\TestCase;
use App\Models\offeredcourse;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetAllCourses()
    {
        // Create some sample courses using the factory
        $course1 = offeredcourse::create([
            'course_id'=> 'CSE101',
            'description'=> 'test description'
        ]);

        // Assert that the database contains the courses data
        $this->assertDatabaseHas('offered_courses', [
            'course_id'=> 'CSE101',
            'description'=> 'test description'
        ]);
    }
}
