<?php

namespace Modules\Coordination\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface DestroyInterface
{
    /**
     * @param  Model  $model
     * @param $id
     * @return mixed
     */
    public function destroyData(Model $model, $id);
    /**
     * @param $id
     * @return mixed
     */
    public function destroyDataTeacher($id);

    /**
     * @param $id
     * @return mixed
     */
    public function destroyDataStudent($id);
}