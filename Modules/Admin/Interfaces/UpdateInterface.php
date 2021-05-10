<?php


namespace Modules\Admin\Interfaces;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

interface UpdateInterface
{
    /**
     * @param FormRequest $classFormRequest
     * @param Model $model
     * @param $id
     * @return mixed
     */
    public function updateData(FormRequest $classFormRequest, Model $model, $id);

    /**
     * @param FormRequest $classFormRequest
     * @param $id
     * @return mixed
     */
    public function updateDataAdministration(FormRequest $classFormRequest, $id);

    /**
     * @param FormRequest $classFormRequest
     * @param $id
     * @return mixed
     */
    public function updateDataCoordination(FormRequest $classFormRequest, $id);

    /**
     * @param FormRequest $classFormRequest
     * @param $id
     * @return mixed
     */
    public function updateDataProatec(FormRequest $classFormRequest, $id);

    /**
     * @param FormRequest $classFormRequest
     * @param $id
     * @return mixed
     */
    public function updateDataSecretary(FormRequest $classFormRequest, $id);

    /**
     * @param FormRequest $classFormRequest
     * @param $id
     * @return mixed
     */
    public function updateDataTeacher(FormRequest $classFormRequest, $id);

    /**
     * @param $classFormRequest
     * @param  Model  $model
     * @param $id
     * @return mixed
     */
    public function updateDataStudent($classFormRequest, Model $model, $id);

    /**
     * @param FormRequest $classFormRequest
     * @param $id
     * @return mixed
     */
    public function updateDataRoom(FormRequest $classFormRequest, $id);
}
