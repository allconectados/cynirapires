<?php


namespace Modules\Admin\Services;


use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Interfaces\GetUrlInterface;

class GetUrl implements GetUrlInterface
{

    /**
     * @param  Model  $model
     * @param $url
     * @return mixed
     */
    public function urlData(Model $model, $url)
    {
        $data = $model->where('url', $url)->first();
        if (!$data) {
            return redirect()->back();
        }
        return $data;
    }
}