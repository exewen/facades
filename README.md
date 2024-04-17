## facades
自行注册Di
## 安装组件
```sh
composer require exewen/facades
```
## 复制配置
```sh
cp -rf exewen/logger/publish/exewen /your_project/config
cp -rf exewen/http/publish/exewen /your_project/config
cp -rf exewen/nacos/publish/exewen /your_project/config
``` 
## 初始化
```php
!defined('BASE_PATH_PKG') && define('BASE_PATH_PKG', dirname(__DIR__, 1));
# 设置配置保存路径
\Exewen\Utils\FileUtil::setSnapshotPath(dirname(__DIR__) . "/config/nacos/env");
``` 
## nacos
```php
# 获取配置文件
NacosFacade::getConfig($this->namespaceId, $this->dataId, $this->group);

# 获取并保存配置文件
NacosFacade::saveConfig($this->namespaceId, $this->dataId, $this->group);

# 读取本地配置文件
$configPath = \Exewen\Utils\FileUtil::getSnapshotFile($this->namespaceId, $this->dataId, $this->group);

# 注册实例
NacosFacade::setInstance($this->namespaceId, $this->serviceName, $this->group, $ip, $port);

# 发送心跳
NacosFacade::setInstanceBeat($this->namespaceId, $this->serviceName, $this->group, $ip, $port);

# 获取实例列表
NacosFacade::getInstance($this->namespaceId, $this->serviceName, $this->group, true);
```

## logger
```php
# info
LoggerFacade::info("info日志");
# error
LoggerFacade::error("error日志");
# warning
LoggerFacade::warning("warning日志");
# notice
LoggerFacade::notice("notice日志");
# debug
LoggerFacade::debug("debug日志");
# request
LoggerFacade::request("request日志");
```