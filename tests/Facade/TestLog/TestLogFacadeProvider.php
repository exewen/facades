<?php

namespace ExewenTest\Facades\Facade\TestLog;

use Exewen\Di\ServiceProvider;

class TestLogFacadeProvider extends ServiceProvider
{
    public function register()
    {
        $this->container->singleton(TestLogFacadeService::class);
    }
}