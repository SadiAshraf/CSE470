<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowRegistrationFormTest extends TestCase
{
    use RefreshDatabase;

    public function testShowRegistrationForm()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertViewIs('register');
    }

    public function testRegister()
    {
        $studentId = '21101075';
        $name = 'fariya';
        $password = 'fariya';

        $response = $this->post('/register', [
            'student_id' => $studentId,
            'name' => $name,
            'password' => $password,
        ]);

        $response->assertRedirect(route('/'));

        $this->assertDatabaseHas('students', [
            'student_id' => $studentId,
            'name' => $name,
        ]);

        $this->assertTrue(Student::where('student_id', $studentId)->first()->password == $password);
    }
}
