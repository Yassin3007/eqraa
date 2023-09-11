<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\TeacherRating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teacher = Teacher::create([
            'name'=>'teacher 1',
            'email'=>'admin@admin.com',
            'password'=>bcrypt(12345678),
            'phone'=>123456789

        ]);
        TeacherRating::create([
            'teacher_id'=>$teacher->id
        ]);
    }
}
