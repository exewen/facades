<?php
declare(strict_types=1);

namespace ExewenTest\Facades;

use Exewen\Facades\NacosFacade;
use PHPUnit\Framework\TestCase;

class FacadesTest extends TestCase
{
    public function __construct()
    {
        parent::__construct();
        !defined('BASE_PATH_PKG') && define('BASE_PATH_PKG', dirname(__DIR__, 1));
    }

    public function testEnvConfig()
    {
        $namespaceId = getenv('NACOS_ENV_PMS_USER');
        $serviceName = getenv('NACOS_DATA_ID_PMS_USER');
        $group = getenv('NACOS_GROUP_PMS_USER');
        $config = NacosFacade::getConfig($namespaceId, $serviceName, $group);
        $this->assertNotEmpty($config);
    }

    public function testGetConfig()
    {
        $namespaceId = getenv('NACOS_ENV_PMS_USER');
        $serviceName = getenv('NACOS_DATA_ID_PMS_USER');
        $group = getenv('NACOS_GROUP_PMS_USER');
        $config = NacosFacade::getConfig($namespaceId, $serviceName, $group);
        $this->assertNotEmpty($config);
    }


}