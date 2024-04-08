<?php

namespace Database\Seeders;

use App\Models\ServiceMedicines;
use Illuminate\Database\Seeder;

class ServiceMedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceMedicines::factory(50)->create();
    }
}
