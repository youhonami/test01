<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\Category;


class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryIds = Category::pluck('id')->toArray();
        Contact::factory()->count(35)->create([
            'category_id' => function () use ($categoryIds) {
                return $categoryIds[array_rand($categoryIds)];
            }
        ]);
    }
}
