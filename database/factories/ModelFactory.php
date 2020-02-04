<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Certification\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Certification\Models\Certification::class, function (Faker\Generator $faker) {
    $icons = [
        'icon-php', 'icon-apache', 'icon-debian', 'icon-fedora', 'icon-redhat', 'icon-suse',
        'icon-ubuntu', 'icon-laravel', 'icon-postgres', 'icon-mysql-alt', 'icon-symfony',
        'icon-javascript-alt', 'fa-linux', 'fa-drupal', 'fa-amazon', 'fa-github'
    ];

    return [
        'certification_name_en' => $faker->word,
        'certification_name_pt' => $faker->word,
        'certification_icon' => $icons[array_rand($icons)]
    ];
});

$factory->define(Certification\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'certification_id' => Certification\Models\Certification::all()->random()->id,
        'category_name_en' => $faker->word,
        'category_name_pt' => $faker->word
    ];
});

$factory->define(Certification\Models\Question::class, function (Faker\Generator $faker) {
    $type = ['text', 'radio', 'checkbox'];
    return [
        'question_name_en' => $faker->word,
        'question_name_pt' => $faker->word,
        'question_type' => $type[array_rand($type)]
    ];
});

$factory->define(Certification\Models\Answer::class, function (Faker\Generator $faker) {
    $answer = ['false', 'true'];
    return [
        'question_id' => Certification\Models\Question::all()->random()->id,
        'answer_name_en' => $faker->word,
        'answer_name_pt' => $faker->word,
        'answer' => $answer[array_rand($answer)]
    ];
});
