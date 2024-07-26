<?php

namespace ExewenTest\Facades\Facade\TestLog;

use Exewen\Facades\Facade;

/**
 * @method static string log(string $message)
 */
class TestLogFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return TestLogFacadeService::class;
    }

    public static function getProviders(): array
    {
        return [TestLogFacadeProvider::class];
    }
}