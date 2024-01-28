<?php
declare(strict_types=1);

namespace ExewenTest\Facades;

use Exewen\Facades\LoggerFacade;
use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase
{
    public function __construct()
    {
        parent::__construct();
        !defined('BASE_PATH_PKG') && define('BASE_PATH_PKG', dirname(__DIR__, 1));
    }

    public function testLogger()
    {
        LoggerFacade::info('info');
        LoggerFacade::debug("debug日志");
        LoggerFacade::error("error日志");
        $this->assertTrue(true);
    }


}