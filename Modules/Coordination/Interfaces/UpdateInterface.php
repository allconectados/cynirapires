<?php


namespace Modules\Coordination\Interfaces;


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
