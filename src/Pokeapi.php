<?php

declare(strict_types=1);

namespace Pokeapi;

use Generator;
use Saloon\Http\Connector;
use Saloon\Contracts\Request;
use Pokeapi\Responses\PokeapiResponse;

class Pokeapi extends Connector
{
    /**
     * Define the custom response
     *
     * @var string
     */
    protected string $response = PokeapiResponse::class;

    /**
     * Resolve the base URL of the service.
     *
     * @return string
     */
    public function resolveBaseUrl(): string
    {
        return 'https://pokeapi.co/api/v2';
    }

    /**
     * Define default headers
     *
     * @return string[]
     */
    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * Iterate over a paginated request
     *
     * @param \Saloon\Contracts\Request $request
     * @param bool $asResponse
     * @return \Generator
     * @throws \ReflectionException
     * @throws \Saloon\Exceptions\InvalidResponseClassException
     * @throws \Saloon\Exceptions\PendingRequestException
     */
    public function paginator(Request $request, bool $asResponse = false): Generator
    {
        $page = 1;

        do {
            $request->query()->merge([
                'offset' => ($page - 1) * 100,
                'limit' => 100,
            ]);

            $response = $this->send($request);

            if ($asResponse === true) {
                yield $response;
            } else {
                foreach ($response->json('results') as $result) {
                    yield $result;
                }
            }

            $page++;
        } while ($response->json('next') !== null);
    }
}
