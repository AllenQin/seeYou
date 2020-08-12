<?php

namespace App\Event\Live;

use App\Model\LiveItem;

class UpdateEvent
{
    /**
     * @var LiveItem
     */
    public $liveItem;

    public function __construct(LiveItem $liveItem)
    {
        $this->liveItem = $liveItem;
    }
}
