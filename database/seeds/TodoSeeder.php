<?php

use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('todos')->insert([
        //     'task' => Str::random(10),
        // ]);

        factory(App\Todo::class, 50)->create();
    }
}
