<?php


namespace Modules\Admin\Interfaces;


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