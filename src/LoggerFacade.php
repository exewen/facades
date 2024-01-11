<?php
declare(strict_types=1);

namespace Exewen\Facades;

use Exewen\Logger\Contract\LoggerInterface;
use Exewen\Logger\LoggerProvider;

/**
 * @method static void info(string $message, array $context = [])
 * @method static void error(string $message, array $context = [])
 * @method static void warning(string $message, array $context = [])
 * @method static void notice(string $message, array $context = [])
 * @method static void debug(string $message, array $context = [])
 * @method static void request(string $message, array $context = [])
 */
class LoggerFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return LoggerInterface::class;
    }

    public static function getProviders(): array
    {
        return [LoggerProvider::class];
    }
}