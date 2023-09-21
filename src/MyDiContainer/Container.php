<?php

declare (strict_types=1);

namespace LearnModernPhp\MyDiContainer;

use Psr\Container\ContainerInterface;
use LearnModernPhp\MyDiContainer\Fetcher;
use LearnModernPhp\MyDiContainer\Fetcher\FetcherInterface;

final class NotFoundException extends \RuntimeException
{
}

final class Container implements ContainerInterface
{
    /** @var array<string, mixed> */
    private $data = [];

    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param string $id
     * @return mixed
     * @throws NotFoundException
     */
    public function get($id)
    {
        if (array_key_exists($id, $this->data)) {
            $data =  $this->data[$id];

            return $data instanceof FetcherInterface
                ? $data->fetch($this)
                : $data;
        }

        throw new NotFoundException("Entry '{$id}' not found");
    }

    /**
     * @param string $id
     * @return bool
     */
    public function has($id): bool
    {
        return array_key_exists($id, $this->data);
    }
}

function get(string $id): Fetcher\Get
{
    return new Fetcher\Get($id);
}

/**
 * @param class-string $class
 * @return Fetcher\Autowire
 */
function autowire(string $class): Fetcher\Autowire
{
    return new Fetcher\Autowire($class);
}
