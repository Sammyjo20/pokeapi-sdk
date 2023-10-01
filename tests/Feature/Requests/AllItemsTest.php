<?php

declare(strict_types=1);

use Pokeapi\Pokeapi;
use Pokeapi\Requests\GetAllItems;
use Pokeapi\Responses\PokeapiResponse;

test('can retrieve all items from the api', function () {
    $pokeapi = new Pokeapi();
    $pokeapi->withMockClient(mockClient());

    $response = $pokeapi->send(new GetAllItems);

    expect($response)->toBeInstanceOf(PokeapiResponse::class);
});

test('can request an iterator', function () {
    $pokeapi = new Pokeapi();
    $iterator = $pokeapi->paginate(new GetAllItems);

    $all = [];

    foreach ($iterator->items() as $item) {
        $all[] = $item;
    }

    expect(count($all))->toEqual(2110);
});
