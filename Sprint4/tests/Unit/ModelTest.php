<?php
use Tests\TestCase;
use App\Models\admin;
use Illuminate\Foundation\Testing\RefreshDatabase;

// class AdminTest extends TestCase
// {
//     use RefreshDatabase;

//     public function testAdminAttributes()
//     {
//         // Create a new admin instance
//         $admin = new admin();

//         // Assert that the admin instance has the correct attributes
//         $this->assertClassHasAttribute('admin_id', admin::class);
//         $this->assertClassHasAttribute('pass', admin::class);
//     }

//     public function testAdminCreation()
//     {
//         // Create a new admin record in the database
//         $admin = admin::create([
//             'admin_id' => 'test_admin',
//             'pass' => 'password123',
//         ]);

//         // Retrieve the admin record from the database
//         $adminFromDb = admin::find('test_admin');

//         // Assert that the retrieved admin record matches the created admin record
//         $this->assertEquals($admin->admin_id, $adminFromDb->admin_id);
//         $this->assertEquals($admin->pass, $adminFromDb->pass);
//     }
// }
