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
