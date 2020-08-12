<?php

namespace App\Repository;

use App\Model\LiveItem;

class LiveItemRepository
{
    /**
     * @param int $id
     * @return LiveItem
     */
    public function getItemById(int $id): LiveItem
    {
        return LiveItem::query()->find($id);
    }

    /**
     * @param LiveItem $item
     * @return bool
     */
    public function updateItem(LiveItem $item): bool
    {
        return $item->update();
    }
}
