<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminsTableSeeder;
use Database\Seeders\SettingsTableSeeder;
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\AttributesTableSeeder;
use Database\Seeders\AttributeValuesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(AttributesTableSeeder::class);
        $this->call(AttributeValuesTableSeeder::class);
    }
}
