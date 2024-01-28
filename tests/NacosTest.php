<?php
declare(strict_types=1);

namespace ExewenTest\Facades;

use Exewen\Facades\NacosFacade;
use PHPUnit\Framework\TestCase;

class NacosTest extends TestCase
{
    private string $serviceName = 'pms-user';
    private string $dataId = 'pms-user.env';
    private string $group = 'DEFAULT_GROUP';
    private string $namespaceId = 'prd';

    public function __construct()
    {
        parent::__construct();
        !defined('BASE_PATH_PKG') && define('BASE_PATH_PKG', dirname(__DIR__, 1));
        # 本地配置文件目录
        \Exewen\Utils\FileUtil::setSnapshotPath(dirname(__DIR__) . "/config/nacos/env");
    }

    /**
     * 获取配置
     * @return void
     */
    public function testGetConfig()
    {
        $config = NacosFacade::getConfig($this->namespaceId, $this->dataId, $this->group);
        $this->assertNotEmpty($config);
    }

    /**
     * 拉取配置到本地
     * @return void
     */
    public function testSaveConfig()
    {
        $config = NacosFacade::saveConfig($this->namespaceId, $this->dataId, $this->group);
        $this->assertNotEmpty($config);
    }

    /**
     * 注册实例
     * @return void
     */
    public function testSetInstance()
    {
        $ip = '10.0.2.143';
        $port = 8081;
        $result = NacosFacade::setInstance($this->namespaceId, $this->serviceName, $this->group, $ip, $port);
        $this->assertTrue($result);
    }

    /**
     * 发送实例心跳
     * @return void
     */
    public function testSetInstanceBeat()
    {
        $ip = '10.0.2.143';
        $port = 8081;
        $result = NacosFacade::setInstanceBeat($this->namespaceId, $this->serviceName, $this->group, $ip, $port);
        $this->assertTrue($result);
    }

    /**
     * 获取实例列表
     * @return void
     */
    public function testGetInstance()
    {
        $result = NacosFacade::getInstance($this->namespaceId, $this->serviceName, $this->group, true);
        $this->assertNotEmpty($result['hosts'] ?? []);
    }

}