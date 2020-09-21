<?php

use App\Models\Answer;
use App\Models\Category;
use App\Models\Like;
use App\Models\Question;
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
        factory(User::class, 10)->create();
        factory(Category::class, 5)->create();
        factory(Question::class, 10)->create();
        factory(Answer::class, 50)->create()->each(function ($reply) {
            return $reply->likes()->save(factory(Like::class)->make());
        });
    }
}
