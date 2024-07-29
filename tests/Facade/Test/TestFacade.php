<?php

namespace ExewenTest\Facades\Facade\Test;

use Exewen\Facades\Facade;

/**
 * @method static string info(string $message)
 */
class TestFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return TestFacadeService::class;
    }

    public static function getProviders(): array
    {
        return [TestFacadeProvider::class];
    }
}