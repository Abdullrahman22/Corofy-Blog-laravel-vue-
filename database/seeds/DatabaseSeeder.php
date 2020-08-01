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
        $this->call(UserSeeder::class);      // 10 Users
        $this->call(CategorySeeder::class);  // 10 Categories
        $this->call(PostSeeder::class);      // 50 Posts
        $this->call(CommentSeeder::class);   // 100 Comments 
        $this->call(SettingSeeder::class);
    }
}
