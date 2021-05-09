<?php

namespace Modules\Admin\Interfaces;

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
    public function editDataAdministration($id);

    /**
     * @param $id
     * @return mixed
     */
    public function editDataCoordination($id);

    /**
     * @param $id
     * @return mixed
     */
    public function editDataProatec($id);

    /**
     * @param $id
     * @return mixed
     */
    public function editDataSecretary($id);

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