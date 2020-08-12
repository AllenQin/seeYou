<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */


use App\Service\User\UserServiceFactory;
use App\Service\User\UserServiceInterface;

return [
    'InnerHttp' => Hyperf\HttpServer\Server::class,
    UserServiceInterface::class => UserServiceFactory::class,
];
