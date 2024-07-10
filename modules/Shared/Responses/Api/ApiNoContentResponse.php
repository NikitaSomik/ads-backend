<?php

declare(strict_types=1);

namespace Modules\Shared\Responses\Api;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

readonly class ApiNoContentResponse implements Responsable
{
    public function __construct(
        protected int $code = ResponseAlias::HTTP_NO_CONTENT,
        protected array $headers = []
    ) {
    }

    public function toResponse($request): Response|ResponseAlias
    {
        return response()->noContent($this->code, $this->headers);
    }
}
