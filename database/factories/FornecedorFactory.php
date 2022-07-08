<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Fornecedor;
use Faker\Generator as Faker;

$factory->define(Fornecedor::class, function (Faker $faker) {
    return [
        'nome' => $this->faker->name,
        'site' => $this->faker->url,
        'uf' => $this->faker->stateAbbr,
        'email' => $this->faker->email,
    ];
});
