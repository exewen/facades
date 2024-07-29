<?php

namespace ExewenTest\Facades\Facade\TestLog;

class TestLogFacadeService implements TestFacadeInterface
{

    public function log(string $message): string
    {
        return $message;
    }
}