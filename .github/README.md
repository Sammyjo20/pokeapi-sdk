# Pokéapi Saloon SDK

This is an example PHP SDK built with [Saloon v2](https://sammyjo20/saloon). 

## Available Requests
- `Pokeapi\Requests\GetAllPokemon`
- `Pokeapi\Requests\GetAllItems`

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
You may prefer to retrieve all the results from the paginated requests by using the `paginator` method on the SDK.

```php
<?php

use Pokeapi\Pokeapi;
use Pokeapi\Requests\GetAllPokemon;

$pokeapi = new Pokeapi();

$results = $pokeapi->paginator(new GetAllPokemon);

foreach($results as $result) {
    // Handle result
}
```
