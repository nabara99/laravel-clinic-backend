<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ProfileClinic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Taufiq',
            'email' => 'taufiq@gmail.com',
            'password' => Hash::make('123456'),
            'phone' => '082281593409',
            'role' => 'admin',
        ]);

        ProfileClinic::factory()->create([
            'name' => 'Klinik Sehat',
            'address' => 'Jl.Transmigrasi Plajau No. 34B Batulicin',
            'phone' => '0518-77456',
            'email' => 'sehatklinik@mail.com',
            'doctor_name' => 'dr. Ahmad Nabil',
            'unique_code' => '897725',
        ]);

        $this->call([
            DoctorSeeder::class,
            DoctorScheduleSeeder::class,
            PatientSeeder::class,
            ServiceMedicineSeeder::class,
        ]);
    }
}
