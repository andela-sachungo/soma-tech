<?php

use Soma\Videos;
use Soma\Categories;
use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Categories::with('user')->get();

        if (!$categories) {
            $categories = factory(Soma\Categories::class, 3)->create();
        }

        foreach ($categories as $category) {
            $category->videos()->save(factory(Soma\Videos::class)->create());
        }
    }
}
