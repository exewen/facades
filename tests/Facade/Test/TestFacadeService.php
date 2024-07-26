<?php

namespace ExewenTest\Facades\Facade\Test;

class TestFacadeService implements TestFacadeInterface
{

    public function info(string $message): string
    {
        return $message;
    }
}