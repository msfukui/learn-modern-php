<?php

declare (strict_types=1);

namespace LearnModernPhp\MyDiContainer\Fetcher;

use LearnModernPhp\MyDiContainer\Container;

interface FetcherInterface
{
    /**
     * @return mixed
     */
    public function fetch(Container $container);
}

final class Get implements FetcherInterface
{
    /** @var string $id */
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function fetch(Container $container)
    {
        return $container->get($this->id);
    }
}
