<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // ContactFactory を使って
        // contacts テーブルに35件のダミーデータを作成
        Contact::factory()->count(35)->create();
    }
}
