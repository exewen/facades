<?php

namespace ExewenTest\Facades\Facade\Test;

use Exewen\Di\ServiceProvider;

class TestFacadeProvider extends ServiceProvider
{
    public function register()
    {
        $this->container->singleton(TestFacadeService::class);
    }
}