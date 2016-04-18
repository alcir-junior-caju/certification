<?php

use Certification\Models\Answer;
use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Answer::class, 100)->create();

        $questions = Certification\Models\Question::all();
        for ($i = 1; $i <= count($questions); $i++) {
            $question = Certification\Models\Question::find($i);
            $categories = Certification\Models\Category::find($i)->id;
            $question->category()->attach($categories);
        }
    }
}
