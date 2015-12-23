<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Soma\User::class, 3)
            ->create()
            ->each(function ($category) {
                $category->categories()->save(factory(Soma\Categories::class)->make());
            });

        // a social user
        factory(Soma\User::class)
            ->create([
                'name' => 'Jane Doe',
                'email' => 'doe@example.com',
                'provider_id' => str_random(32),
                'avatar'=> 'public/image/person_avatar.png',
            ]);
    }
}
