<?php

declare(strict_types=1);

namespace Pokeapi\Requests;

use Saloon\Http\Request;

class GetAllItems extends Request
{
    /**
     * HTTP Method
     *
     * @var string
     */
    protected string $method = 'GET';

    /**
     * Resolve the endpoint
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/item';
    }
}
