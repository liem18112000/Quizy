<?php

namespace Database\Seeders;

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
        // Create User
         \App\Models\User::factory(10)->create();

        // // // Create Course
         \App\Models\Course::factory(10)->create();

        // // // Create Exams
         \App\Models\Exam::factory(10)->create();

        // // // Create Question
        \App\Models\Question::factory(40)->create();

        // Create Choices
        \App\Models\Choice::factory(160)->create();


    }
}
