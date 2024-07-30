<?php
declare(strict_types=1);

namespace Exewen\Facades;

use Exewen\Http\Constants\HttpEnum;
use Exewen\Http\Contract\HttpClientInterface;
use Exewen\Http\HttpProvider;

/**
 * @method static string get(string $driver, string $uri, array $params = [], array $header = [], array $options = [])
 * @method static string head(string $driver, string $uri, array $params = [], array $header = [], array $options = [])
 * @method static string post(string $driver, string $uri, array $params = [], array $header = [], array $options = [], string $type = HttpEnum::TYPE_JSON)
 * @method static string put(string $driver, string $uri, array $params = [], array $header = [], array $options = [], string $type = HttpEnum::TYPE_JSON)
 * @method static string patch(string $driver, string $uri, array $params = [], array $header = [], array $options = [], string $type = HttpEnum::TYPE_JSON)
 * @method static string delete(string $driver, string $uri, array $params = [], array $header = [], array $options = [])
 * @method static string options(string $driver, string $uri, array $params = [], array $header = [], array $options = [])
 */
class HttpFacade extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return HttpClientInterface::class;
    }

    public static function getProviders(): array
    {
        return [HttpProvider::class];
    }
}