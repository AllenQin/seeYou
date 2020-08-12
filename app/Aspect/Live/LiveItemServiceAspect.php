<?php

namespace App\Aspect\Live;

use App\Model\LiveItem;
use Hyperf\Cache\Listener\DeleteListenerEvent;
use Hyperf\Di\Annotation\Aspect;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * Class LiveItemServiceAspect
 *
 * @Aspect()
 *
 * @package App\Aspect\Live
 */
class LiveItemServiceAspect extends AbstractAspect
{
    public $classes = [
        'App\Service\Live\LiveItemService::updateItem',
    ];

    /**
     * @Inject()
     *
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        /**
         * @var LiveItem
         */
        $result = $proceedingJoinPoint->process();

        $liveItem = $this->getLiveItem($proceedingJoinPoint);

        if ($result) {
            $this->dispatcher->dispatch(new DeleteListenerEvent('live-update', [$liveItem->id]));
        }

        return $result;
    }

    /**
     * @param ProceedingJoinPoint $proceedingJoinPoint
     *
     * @return LiveItem
     */
    private function getLiveItem(ProceedingJoinPoint $proceedingJoinPoint)
    {
        $arguments = $proceedingJoinPoint->getArguments();

        return $arguments[0];
    }
}
