<?php

namespace Database\Seeders;

use App\Models\Supervisor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supervisor::create([
            'name'=>'supervisor 1',
            'email'=>'admin@admin.com',
            'password'=>bcrypt(12345678),
            'phone'=>123456789

        ]);
    }
}
