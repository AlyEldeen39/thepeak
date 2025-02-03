<?php

declare(strict_types=1);

namespace Framework;

use App\Exceptions\ContainerExcpetion;
use ReflectionClass;
use ReflectionNamedType;

class Container
{

    private array $definitions = [];
    private array $resolved = [];

    public function addDefinitions(array $newDefinitions)
    {
        $this->definitions = [...$this->definitions, ...$newDefinitions];
    }

    public function resolve(string $className)
    {
        $reflectionClass = new ReflectionClass($className);

        if (!$reflectionClass->isInstantiable()) {
            throw new ContainerExcpetion("{$className} is not instantiable");
        }

        $constructor = $reflectionClass->getConstructor();

        if (!$constructor) {
            return new $className;
        }

        $params = $constructor->getParameters();

        if (count($params) === 0) {
            return new $className;
        }

        $dependencies = [];

        foreach ($params as $param) {
            $name = $param->getName();
            $type = $param->getType();

            if (!$type) {
                throw new ContainerExcpetion("Failed to resolve {$className} due to missing type hinting for $name");
            }

            if (!$type instanceof ReflectionNamedType || $type->isBuiltin()) {
                throw new ContainerExcpetion("{$className} is not of a correct type");
            }

            $dependencies[] = $this->instantiate($type->getName());
        }

        return $reflectionClass->newInstanceArgs($dependencies);
    }

    public function instantiate(string $id)
    {
        if (!array_key_exists($id, $this->definitions)) {
            throw new ContainerExcpetion("Dependency isn't defined");
        }

        if (array_key_exists($id, $this->resolved)) {
            return $this->resolved[$id];
        }

        $factory = $this->definitions[$id];
        $dependency = $factory();

        $this->resolved[$id] = $dependency;

        return $dependency;
    }
}
