<?php

declare(strict_types=1);

namespace Pokeapi\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetAllItems extends Request
{
    /**
     * HTTP Method
     *
     * @var Method
     */
    protected Method $method = Method::GET;

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
