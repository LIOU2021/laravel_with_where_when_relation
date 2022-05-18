<?php

namespace Database\Seeders;

use App\Models\Textbook;
use Illuminate\Database\Seeder;

class TextbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Textbook::insert([
            [
                'subject_id' => 1,
                'book_version_id'=>1,
                'name' => '基米拉大師之路'
            ],
            [
                'subject_id' => 2,
                'book_version_id'=>3,
                'name' => '夏頁'
            ],
            [
                'subject_id' => 2,
                'book_version_id'=>3,
                'name' => '秋葉'
            ],
            [
                'subject_id' => 2,
                'book_version_id'=>3,
                'name' => '東葉'
            ],
            [
                'subject_id' => 2,
                'book_version_id'=>3,
                'name' => 'abc1'
            ],
            [
                'subject_id' => 3,
                'book_version_id'=>2,
                'name' => 'abc2'
            ],
            [
                'subject_id' => 2,
                'book_version_id'=>2,
                'name' => 'abc3'
            ],
        ]);
    }
}
