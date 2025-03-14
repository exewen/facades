<?php
declare(strict_types=1);

namespace Exewen\Facades;

use Exewen\Di\Container;
use Exewen\Di\Contract\ContainerInterface;
use Exewen\Facades\Contract\FacadeInterface;
use Exewen\Di\Context\ApplicationContext;
use Exewen\Facades\Exception\FacadeException;

abstract class Facade implements FacadeInterface
{
    /**
     * 记录不同Facade是否注册
     * @var array
     */
    protected static $registerMap = [];

    /**
     * 服务名
     * @return string
     */
    public static function getFacadeAccessor(): string
    {
        return FacadeInterface::class;
    }

    /**
     * 注册
     * @return array
     */
    public static function getProviders(): array
    {
        return [];
    }

    /**
     * 框架依赖注入调用
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        $facadeApp = static::getFacadeApp();

        $instance = $facadeApp->get(static::getFacadeAccessor());
        if (!$instance) {
            throw new FacadeException('A facade root has not been set :' . static::getFacadeAccessor());
        }

        return $instance->$method(...$args);
    }

    /**
     * Facade 调用
     * @param $method
     * @param $args
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        $facadeApp = static::getFacadeApp();

        $instance = $facadeApp->get(static::getFacadeAccessor());
        if (!$instance) {
            throw new FacadeException('A facade root has not been set :' . static::getFacadeAccessor());
        }

        return $instance->$method(...$args);
    }

    /**
     * 初始化容器
     * @return ContainerInterface|null
     */
    public static function getFacadeApp(): ?ContainerInterface
    {
        $container = ApplicationContext::getContainer();
        /** 检查门面是否注册 */
        if (!self::hasRegister(static::getFacadeAccessor())) {
            $container->setProviders(static::getProviders());
            self::setRegister(static::getFacadeAccessor());
        }
        return $container;
    }

    /**
     * @deprecated 替换为 ApplicationContext::getContainer()
     * @return Container|ContainerInterface|null
     */
    public static function getContainer()
    {
        return ApplicationContext::getContainer();
    }

    /**
     * 是否注册
     * @param string $class
     * @return false|mixed
     */
    public static function hasRegister(string $class)
    {
        return self::$registerMap[$class] ?? false;
    }

    /**
     * 记录注册
     * @param string $class
     * @return void
     */
    public static function setRegister(string $class)
    {
        self::$registerMap[$class] = true;
    }

}