<?php

namespace Database\Seeders;

use App\Models\BookVersion;
use Illuminate\Database\Seeder;

class BookVersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookVersion::insert([
            [
                'id' => 1,
                'name' => 'A出版社'
            ],
            [
                'id' => 2,
                'name' => 'B出版社'
            ],
            [
                'id' => 3,
                'name' => 'C出版社'
            ],
        ]);
    }
}
