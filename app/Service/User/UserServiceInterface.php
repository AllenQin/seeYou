<?php

namespace App\Service\User;

interface UserServiceInterface
{
    /**
     * @param int $id
     *
     * @return \Hyperf\Database\Model\Builder|\Hyperf\Database\Model\Model|object|null
     */
    public function getInfoById(int $id);

    public function updateInfoById(\App\Model\LiveItem $item);
}
