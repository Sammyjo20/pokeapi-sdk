<?php

declare(strict_types=1);

namespace Pokeapi;

use Saloon\Http\Connector;
use Saloon\Contracts\Request;
use Saloon\Contracts\Response;
use Pokeapi\Responses\PokeapiResponse;
use Saloon\PaginationPlugin\Paginator;
use Saloon\PaginationPlugin\OffsetPaginator;
use Saloon\PaginationPlugin\Contracts\HasPagination;

class Pokeapi extends Connector implements HasPagination
{
    /**
     * Define the custom response
     *
     * @var string|null
     */
    protected ?string $response = PokeapiResponse::class;

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
     * Paginate
     */
    public function paginate(Request $request): Paginator
    {
        return new class(connector: $this, request: $request) extends OffsetPaginator {
            /**
             * Per-page limit
             */
            protected ?int $perPageLimit = 100;

            /**
             * @inheritDoc
             */
            protected function isLastPage(Response $response): bool
            {
                return empty($response->json('next'));
            }

            /**
             * @inheritDoc
             */
            protected function getPageItems(Response $response, Request $request): array
            {
                return $response->json('results');
            }
        };
    }
}
