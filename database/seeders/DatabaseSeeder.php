<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Item;
use App\Models\Label;
use App\Models\User;
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

        $users = collect();

        $users->add(
            User::factory()->create([
                'email' => 'admin@szerveroldali.hu',
                'password' => 'adminpwd',
                'is_admin' => 1,
            ])
        );

        for ($i = 1; $i < 10; $i++) {
            $users->add(
                User::factory()->create([
                    'email' => 'user' . $i . '@szerveroldali.hu'
                ])
            );
        }

        $items = Item::factory(10)->create();
        
        $comments = Comment::factory(20)->create();
        
        $labels = Label::factory(10)->create();
        
        
        // TODO:  Relaciok a db-ben 

        foreach($items as $item) {
            $tmp_array = range(1, $labels->count());
            shuffle($tmp_array);
            for ($i = 0; $i < rand(1, $labels->count()); $i++) {
                $item->labels()->attach(array_pop($tmp_array));
            }
        }
    }
}
