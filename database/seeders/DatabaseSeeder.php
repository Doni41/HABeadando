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
        
        $comments = Comment::factory(10)->create();
        
        $labels = Label::factory(10)->create();
        
        
        // TODO:  Relaciok a db-ben 
        
        //$items = Item::factory(10)->create()->each(function($items) use (&$comments, &$labels) {
            //$item['comment_id'] = $comments->random()->save();
            //$item->comments();
            // $item->comments()->associate($comments->random())->save();

            // $item->labels()->associate($labels->random())->save();
        //});
        
        /*
        $items->each(function ($item) use (&$comments, &$labels) {
            // $item->comments()->associate($comments->random())->save();

            // $item->labels()->associate($labels->random())->save();
            // $item->comments()->saveMany($comments->random())->create();
        });
        */
        
        
        

        //$items[1]->comments()->save($comments[0]);

        /*
        for ($i = 1; $i < 11; $i++) {
            $items['comment_id'] = $items[$i]->comments()->save($comments[$i]);
            $items['label_id'] = $items[$i]->labels()->save($labels[$i]);
        }
        */
        

        //\App\Models\User::factory(10)->create()
        //\App\Models\Item::factory(10)->create();
        //\App\Models\Comment::factory(10)->create();
        //\App\Models\Label::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
