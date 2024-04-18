<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TasksTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TasksTableSeeder::class);
    }
}
