<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'nome' => $this->faker->name(),
        'descricao' => $this->faker->text(50),
        'peso' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 1000),
        'unidade_id' => $this->faker->numberBetween($min = 0, $max = 999)
    ];
});