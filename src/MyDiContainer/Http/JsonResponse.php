<?php

declare (strict_types=1);

namespace LearnModernPhp\MyDiContainer\Http;

use JsonSerializable;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

final class JsonResponse implements JsonSerializable, ResponseInterface
{
    /* php-stan-var array<K, V> */
    private array $data;

    protected StreamFactoryInterface $streamFactory;
    protected ResponseInterface $innerResponse;

    /**
     * @param array<K, V> $data
     */
    public function __construct(
        ?array $data,
        ResponseInterface $innerResponse,
        StreamFactoryInterface $streamFactory
    ) {
        if ($data !== null) {
            $this->data = $data;
        }

        $this->innerResponse = $innerResponse;
        $this->streamFactory = $streamFactory;
    }

    /**
     * @phpstan-return array<K,V>
     */
    public function jsonSerialize(): array
    {
        return $this->data;
    }

    /**
     * @phpstan-param array<K,V> $data
     * @return JsonResponse<K,V>
     */
    public function withJsonData(?array $data): null|ResponseInterface|StreamFactoryInterface
    {
        return new static(
            $this->data ?? null,
            $this->innerResponse,
            $this->streamFactory
        );
    }

    /**
     * @return string HTTP protocol version.
     */
    public function getProtocolVersion(): string
    {
        return $this->innerResponse->getProtocolVersion();
    }

    /**
     * @param string $version HTTP protocol version
     * @return static
     */
    public function withProtocolVersion($version): self
    {
        return new static(
            $this->data ?? null,
            $this->innerResponse->withProtocolVersion($version),
            $this->streamFactory
        );
    }

    /**
     * @param string $name Case-insensitive header field name.
     * @param string|string[] $value Header value(s).
     * @return static
     * @throws \InvalidArgumentException for invalid header names or values.
     */
    public function withHeader($name, $value): self
    {
        return new static(
            $this->data ?? null,
            $this->innerResponse->withHeader($name, $value),
            $this->streamFactory
        );
    }

    /**
     * @param string $name Case-insensitive header field name to add.
     * @param string|string[] $value Header value(s).
     * @return static
     * @throws \InvalidArgumentException for invalid header names or values.
     */
    public function withAddedHeader($name, $value): self
    {
        return new static(
            $this->data ?? null,
            $this->innerResponse->withAddedHeader($name, $value),
            $this->streamFactory
        );
    }

    /**
     * @param string $name Case-insensitive header field name to remove.
     * @return static
     */
    public function withoutHeader($name): self
    {
        return new static(
            $this->data ?? null,
            $this->innerResponse->withoutHeader($name),
            $this->streamFactory
        );
    }

    /**
     * @return StreamInterface Returns the body as a stream.
     */
    public function getBody(): StreamInterface
    {
        $json = json_encode($this);

        assert($json !== false);

        return $this->streamFactory->createStream($json);
    }

    /**
     *
     * @param StreamInterface $body Body.
     * @return static
     * @throws \InvalidArgumentException When the body is not valid.
     */
    public function withBody(StreamInterface $body): self
    {
        throw new \InvalidArgumentException();
    }

    /**
     * @param int $code The 3-digit integer result code to set.
     * @param string $reasonPhrase The reason phrase to use with the
     *     provided status code; if none is provided, implementations MAY
     *     use the defaults as suggested in the HTTP specification.
     * @return static
     * @throws \InvalidArgumentException For invalid status code arguments.
     */
    public function withStatus($code, $reasonPhrase = ''): self
    {
        return new static(
            $this->data ?? null,
            $this->innerResponse->withStatus($code, $reasonPhrase),
            $this->streamFactory
        );
    }

    /**
     * @return string[][] Returns an associative array of the message's headers. Each
     *     key MUST be a header name, and each value MUST be an array of strings
     *     for that header.
     */
    public function getHeaders(): array
    {
        return $this->innerResponse->getHeaders();
    }

    /**
     * @param string $name Case-insensitive header field name.
     * @return bool Returns true if any header names match the given header
     *     name using a case-insensitive string comparison. Returns false if
     *     no matching header name is found in the message.
     */
    public function hasHeader($name): bool
    {
        return $this->innerResponse->hasHeader($name);
    }

    /**
     * @param string $name Case-insensitive header field name.
     * @return string[] An array of string values as provided for the given
     *    header. If the header does not appear in the message, this method MUST
     *    return an empty array.
     */
    public function getHeader($name): array
    {
        return $this->innerResponse->getHeader($name);
    }

    /**
     * @param string $name Case-insensitive header field name.
     * @return string A string of values as provided for the given header
     *    concatenated together using a comma. If the header does not appear in
     *    the message, this method MUST return an empty string.
     */
    public function getHeaderLine($name): string
    {
        return $this->getHeaderLine($name);
    }

    /**
     * @return int Status code.
     */
    public function getStatusCode(): int
    {
        return $this->innerResponse->getStatusCode();
    }

    /**
     * @link http://tools.ietf.org/html/rfc7231#section-6
     * @link http://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
     * @return string Reason phrase; must return an empty string if none present.
     */
    public function getReasonPhrase(): string
    {
        return $this->innerResponse->getReasonPhrase();
    }
}
