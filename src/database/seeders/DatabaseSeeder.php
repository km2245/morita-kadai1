<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\ContactsTableSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // 先に categories を作らないと
        // contacts の category_id が入れられない
        $this->call([
            CategoriesTableSeeder::class,
            ContactsTableSeeder::class,
        ]);
    }
}
