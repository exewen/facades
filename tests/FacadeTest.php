<?php
declare(strict_types=1);

namespace ExewenTest\Facades;

use Exewen\Facades\LoggerFacade;
use ExewenTest\Facades\Facade\Test\TestFacade;
use ExewenTest\Facades\Facade\TestLog\TestLogFacade;
use PHPUnit\Framework\TestCase;

class FacadeTest extends TestCase
{
    public function __construct()
    {
        parent::__construct();
        !defined('BASE_PATH_PKG') && define('BASE_PATH_PKG', dirname(__DIR__, 1));
    }

    public function testFacade()
    {
        $result_1 = TestFacade::info('info');
        echo $result_1 . PHP_EOL;
        $result_1 = TestFacade::info('info');
        echo $result_1 . PHP_EOL;
        $result_2 = TestLogFacade::log('log');
        echo $result_2 . PHP_EOL;
        $result_2 = TestLogFacade::log('log');
        echo $result_2 . PHP_EOL;
        LoggerFacade::info("test");
        $this->assertNotEmpty($result_2);
    }


}