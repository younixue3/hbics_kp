<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EventSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CostumerSeeder::class);
        $this->call(ProvinsiSeeder::class);
        $this->call(KotaKabupatenSeeder::class);
        $this->call(KategoriLombaSeeder::class);
        $this->call(KategoriLpSeeder::class);
    }
}
