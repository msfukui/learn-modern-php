<?php

declare (strict_types=1);

namespace LearnModernPhp\MyDiContainer\Http;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;

final class JsonResponseFactory implements ResponseFactoryInterface
{
    private ResponseFactoryInterface $responseFactory;
    private StreamFactoryInterface $streamFactory;

    public function __construct(
        ResponseFactoryInterface $responseFactory,
        StreamFactoryInterface $streamFactory
    ) {
        $this->responseFactory = $responseFactory;
        $this->streamFactory = $streamFactory;
    }

    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface
    {
        return new JsonResponse(
            null,
            $this->responseFactory->createResponse($code, $reasonPhrase),
            $this->streamFactory
        );
    }
}
