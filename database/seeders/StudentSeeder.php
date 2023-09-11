<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name'=>'student 1',
            'email'=>'admin@admin.com',
            'password'=>bcrypt(12345678),
            'phone'=>123456789,
            'teacher_id'=>1 ,
            'lessons_no'=>8 ,
        ]);
    }
}
