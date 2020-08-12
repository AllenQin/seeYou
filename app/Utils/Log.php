<?php

namespace App\Utils;

use Hyperf\Logger\LoggerFactory;
use Hyperf\Utils\ApplicationContext;

class Log
{
    /**
     * @param string $name
     *
     * @return \Psr\Log\LoggerInterface
     */
    public static function get($name = 'app')
    {
        return ApplicationContext::getContainer()->get(LoggerFactory::class)->get($name);
    }
}
