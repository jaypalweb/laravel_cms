<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset the users
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        
        // generate 3 users/author
        $facker = Factory::create();

        DB::table('users')->insert([
            [
                'name' => "John Doe",
                'slug' => 'john-doe',
                'email' => "johndoe@test.com",
                'password' => bcrypt('secret'),
                'bio' => $facker->text(rand(250, 300))
            ],
            [
                'name' => "Jane Doe",
                'slug' => 'jane-doe',
                'email' => "janedoe@test.com",
                'password' => bcrypt('secret'),
                'bio' => $facker->text(rand(250, 300))
            ],
            [
                'name' => "Edo Masaru",
                'slug' => 'edo-masaru',
                'email' => "edo@test.com",
                'password' => bcrypt('secret'),
                'bio' => $facker->text(rand(250, 300))
            ],
        ]);
    }
}
