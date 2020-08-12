<?php

namespace App\Service\User;

use App\Model\LiveItem;

class UserService implements UserServiceInterface
{
    public function __construct($enableCache)
    {

    }

    /**
     * @param int $id
     *
     * @return \Hyperf\Database\Model\Builder|\Hyperf\Database\Model\Model|object|null
     */
    public function getInfoById(int $id)
    {
        return LiveItem::query()->where('id', $id)->first();
    }

    /**
     * @param LiveItem $item
     * @return bool
     */
    public function updateInfoById(\App\Model\LiveItem $item)
    {
        return $item->update();
    }
}