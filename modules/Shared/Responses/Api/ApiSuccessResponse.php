<?php

declare(strict_types=1);

namespace Modules\Shared\Responses\Api;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

readonly class ApiSuccessResponse implements Responsable
{
    /**
     * @param  mixed  $data
     * @param  array  $metaData
     * @param  ?int  $code
     * @param  array  $headers
     */
    public function __construct(
        protected mixed $data,
        protected array $metaData,
        protected ?int $code = ResponseAlias::HTTP_OK,
        protected array $headers = []
    ) {
    }

    /**
     * @param $request
     *
     * @return JsonResponse|ResponseAlias
     */
    public function toResponse($request): JsonResponse|ResponseAlias
    {
        return response()->json([
            'data' => $this->data,
            'metadata' => $this->metaData,
        ], $this->code, $this->headers);
    }
}
