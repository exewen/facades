<?php
declare(strict_types=1);

namespace Exewen\Facades;

use Exewen\Di\Container;
use Exewen\Di\Contract\ContainerInterface;
use Exewen\Facades\Contract\FacadeInterface;
use Exewen\Facades\Exception\FacadeException;

abstract class Facade implements FacadeInterface
{
//    protected static ?ContainerInterface $app = null;
    protected static $app = null;

    public static function __callStatic($method, $args)
    {
        $facadeApp = static::getFacadeApp();

        $instance = $facadeApp->get(static::getFacadeAccessor());
        if (!$instance) {
            throw new FacadeException('A facade root has not been set.');
        }

        return $instance->$method(...$args);
    }

    /**
     * 初始化容器
     * @return ContainerInterface|null
     */
    public static function getFacadeApp(): ?ContainerInterface
    {
        if (self::$app === null) {
            self::$app = new Container();
            self::$app->setProviders(static::getProviders());
        }
        return self::$app;
    }


}