<?php

use App\Quiz;
use App\User;
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
        factory(User::class)->create([
            'email' => 'dev@dorellango.cl',
            'is_admin' => true
        ]);

        factory(Quiz::class, 20)->create();
    }
}
