<?php

namespace App\Service\User;

use Hyperf\Contract\ConfigInterface;
use Hyperf\Contract\ContainerInterface;

class UserServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get(ConfigInterface::class);
        $enableCache = $config->get('cache.enable', false);

        return make(UserService::class, compact('enableCache'));
    }
}
