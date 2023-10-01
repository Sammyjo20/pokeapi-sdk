# Pokéapi Saloon SDK

This is an example PHP SDK built with [Saloon v2](https://github.com/saloonphp/saloon).

## Available Requests
- `Pokeapi\Requests\GetAllPokemon`
- `Pokeapi\Requests\GetAllItems`

## Installation

Use Composer to install this SDK

```
composer require sammyjo20/pokeapi-sdk
```

## Usage

Simply call the `send` method with the request class you would like to send. Once sent, a `PokeapiResponse` is returned.

```php
<?php

use Pokeapi\Pokeapi;
use Pokeapi\Requests\GetAllPokemon;

$pokeapi = new Pokeapi();

$response = $pokeapi->send(new GetAllPokemon);
```

## Paginated Results
You may prefer to retrieve all the results from the paginated requests by using the `paginate` method on the SDK.

```php
<?php

use Pokeapi\Pokeapi;
use Pokeapi\Requests\GetAllPokemon;

$pokeapi = new Pokeapi();

$paginator = $pokeapi->paginate(new GetAllPokemon);

foreach($paginator->items() as $item) {
    // Handle result
}
```
