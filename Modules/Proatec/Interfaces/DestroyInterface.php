<?php

namespace Modules\Proatec\Interfaces;

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
    public function destroyDataAdministration($id);

    /**
     * @param $id
     * @return mixed
     */
    public function destroyDataCoordination($id);

    /**
     * @param $id
     * @return mixed
     */
    public function destroyDataProatec($id);

    /**
     * @param $id
     * @return mixed
     */
    public function destroyDataSecretary($id);

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