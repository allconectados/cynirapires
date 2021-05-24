<?php

namespace Modules\Coordination\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface EditInterface
{
    /**
     * @param Model $model
     * @param $id
     * @return mixed
     */
    public function editData(Model $model, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function editDataTeacher($id);

    /**
     * @param $id
     * @return mixed
     */
    public function editDataStudent($id);
}