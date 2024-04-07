<?php

declare (strict_types=1);

namespace LearnModernPhp\MyDiContainer\Fetcher;

use LearnModernPhp\MyDiContainer\Container;
use ReflectionClass;

final class Autowire implements FetcherInterface
{
    /** @var class-string $className */
    private string $className;

    /**
     * @param class-string $className
     */
    public function __construct(string $className)
    {
        $this->className = $className;
    }

    /**
     * @return object
     */
    public function fetch(Container $container)
    {
        $arguments = [];

        foreach ($this->getConstructorParameters() as $parameter) {
            $arguments[] = $this->buildArgument($parameter, $container);
        }

        return new $this->className(...$arguments);
    }

    /**
     * @param \ReflectionParameter $parameter
     * @return mixed
     */
    public function buildArgument(\ReflectionParameter $parameter, Container $container)
    {
        $type = $parameter->getType();

        if ($type instanceof \ReflectionUnionType) {
            throw new \InvalidArgumentException(
                "Fail to autowire {$this->className}, because do not support union/intersection type yet."
            );
        }

        $name = $parameter->getName();

        if ($type === null || (method_exists($type, 'isBuiltIn') && $type->isBuiltIn())) {
            if (!$container->has($name)) {
                throw new \InvalidArgumentException(
                    "Fail to autowire {$this->className}, because not found argument '{$name}' in the container."
                );
            }
            return $container->get($name);
        }

        if ($type instanceof \ReflectionNamedType) {
            $name = $type->getName();
            $arg = $container->has($name) ? $container->get($name) : null;

            if ($arg === null && !$type->allowsNull()) {
                throw new \InvalidArgumentException(
                    "Fail to autowire {$this->className}, because not found argument '{$name}' and not nullable."
                );
            }
            return $arg;
        }

        throw new \InvalidArgumentException(
            "Fail to autowire {$this->className}, because argument '{$name}' is unexpected form."
        );
    }

    /**
     * @return array<int,\ReflectionParameter>
     */
    public function getConstructorParameters(): array
    {
        $ref = new ReflectionClass($this->className);
        $ref_constructor = $ref->getConstructor();

        if ($ref_constructor === null) {
            throw new \InvalidArgumentException(
                "Fail to autowire, because {$this->className} do not has __construct() method."
            );
        }

        return $ref_constructor->getParameters();
    }
}
