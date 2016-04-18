<?php

use Certification\Models\Certification;
use Illuminate\Database\Seeder;

class CertificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('TRUNCATE TABLE certifications CASCADE');

        factory(Certification::class, 12)->create();
    }
}
