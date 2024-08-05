<?php
declare(strict_types=1);

namespace Exewen\Facades;

use Exewen\Di\Container;

class AppFacade
{
    /**
     * 获取容器
     * @return Container|\Exewen\Di\Contract\ContainerInterface|null
     */
    public static function getContainer()
    {
        $container = Container::getInstance();
        if ($container === null) {
            $container = new Container();
        }
        return $container;
    }

    /**
     * 注册绑定（单例）并返回
     * @param string $abstract
     * @param $concrete
     * @return mixed
     */
    public static function singleton(string $abstract, $concrete = null)
    {
        /** @var Container $app */
        $app = self::getContainer();
        $app->singleton($abstract, $concrete);
        return $app->get($abstract);
    }

    /**
     * 绑定实例或者闭包并返回
     * @param string $abstract
     * @param $concrete
     * @return mixed
     */
    public static function bind(string $abstract, $concrete = null)
    {
        /** @var Container $app */
        $app = self::getContainer();
        $app->bind($abstract, $concrete);
        return $app->get($abstract);
    }

}