<?php

declare(strict_types=1);

use Pokeapi\Pokeapi;
use Pokeapi\Requests\GetAllPokemon;
use Pokeapi\Responses\PokeapiResponse;

test('can retrieve all pokemon from the api', function () {
    $pokeapi = new Pokeapi();
    $pokeapi->withMockClient(mockClient());

    $response = $pokeapi->send(new GetAllPokemon);

    expect($response)->toBeInstanceOf(PokeapiResponse::class);
});

test('can request an iterator', function () {
    $pokeapi = new Pokeapi();
    $iterator = $pokeapi->paginate(new GetAllPokemon);

    $all = [];

    foreach ($iterator->items() as $pokemon) {
        $all[] = $pokemon;
    }

    expect(count($all))->toEqual(1292);
});
