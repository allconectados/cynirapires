<?php


namespace Modules\Teacher\Services;


use Illuminate\Database\Eloquent\Model;
use Modules\Teacher\Interfaces\ListDataInterface;

class ListDataService implements ListDataInterface
{

    /**
     * @param  Model  $model
     * @param  string  $orderBy
     * @param  string  $direction
     * @return mixed
     */
    public function listData(Model $model, string $orderBy, string $direction)
    {
        return $model->orderBy($orderBy, $direction)->get();
    }
}