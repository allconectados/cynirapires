<?php


namespace Modules\Coordination\Interfaces;


use Illuminate\Database\Eloquent\Model;

interface GetUrlInterface
{
    /**
     * @param Model $model
     * @param $url
     * @return mixed
     */
    public function urlData(Model $model, $url);
}