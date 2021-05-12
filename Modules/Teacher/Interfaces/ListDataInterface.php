<?php


namespace Modules\Teacher\Interfaces;


use Illuminate\Database\Eloquent\Model;

interface ListDataInterface
{
    /**
     * @param Model $model
     * @param string $orderBy
     * @param string $direction
     * @return mixed
     */
    public function listData(Model $model, string $orderBy, string $direction);
}