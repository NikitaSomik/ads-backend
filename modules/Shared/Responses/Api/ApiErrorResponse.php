<?php

declare(strict_types=1);

namespace Modules\Shared\Responses\Api;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Throwable;

readonly class ApiErrorResponse implements Responsable
{
    /**
     * @param  Throwable  $e
     * @param  string  $message
     * @param  int  $code
     * @param  array  $headers
     */
    public function __construct(
        protected Throwable $e,
        protected string $message,
        protected int $code = ResponseAlias::HTTP_INTERNAL_SERVER_ERROR,
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
        $response = ['message' => $this->message];

        if ($this->e && config('app.debug')) {
            $response['debug'] = [
                'message' => $this->e->getMessage(),
                'file' => $this->e->getFile(),
                'line' => $this->e->getLine(),
                'trace' => $this->e->getTrace(),
            ];
        }

        return response()->json($response, $this->code, $this->headers);
    }
}
