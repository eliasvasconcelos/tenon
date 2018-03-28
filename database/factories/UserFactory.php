<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

/*$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'cpf' => 0,
        'cnpj' => 0,
        'tipo_id' => rand(1, 3),
    ];
});

$factory->define(App\Models\Categoria::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'categoria_id' => rand(0, 3),
    ];
});*/

$factory->define(App\Models\Anuncio::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 10),
        'categoria_id' => rand(1, 20),
        'titulo' => $faker->title,
        'descricao' => $faker->text,
        'uf_id' => rand(1, 27),
        'premium' => rand(0, 1),
    ];
});
