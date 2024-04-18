<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_BR');

        // get users ids
        $users = User::all();

        // Generate 120 tasks
        for ($i = 0; $i < 120; $i++) {
            DB::table('tasks')->insert([
                'user_id' => $users->random()->id,
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
                'deadline' => $faker->optional()->dateTimeBetween('-1 month', '+1 month'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
