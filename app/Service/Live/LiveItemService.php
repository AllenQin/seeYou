<?php

namespace App\Service\Live;

use App\Model\LiveItem;
use App\Repository\LiveItemRepository;
use Hyperf\Cache\Annotation\Cacheable;
use Hyperf\Di\Annotation\Inject;

class LiveItemService
{
    /**
     * @Inject()
     *
     * @var LiveItemRepository
     */
    protected $liveItemRepository;

    public function __construct(LiveItemRepository $repository)
    {
        $this->liveItemRepository = $repository;
    }

    /**
     * @Cacheable(prefix="user", ttl=9000, listener="live-update")
     *
     * @param int $id
     * @return LiveItem
     */
    public function findItemById(int $id)
    {
        return $this->liveItemRepository->getItemById($id);
    }

    public function updateItem(LiveItem $item, $data)
    {
        $item->fill($data);

        return $this->liveItemRepository->updateItem($item);
    }
}
