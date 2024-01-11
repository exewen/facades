<?php
declare(strict_types=1);

namespace Exewen\Facades\Contract;

interface FacadeInterface
{
    public static function getFacadeAccessor(): string;

    public static function getProviders(): array;
}