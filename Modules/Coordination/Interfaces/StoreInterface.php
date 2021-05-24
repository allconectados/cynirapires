<?php


namespace Modules\Coordination\Interfaces;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

interface StoreInterface
{
    /**
     * @param  FormRequest  $classFormRequest
     * @param  Model  $model
     * @return mixed
     */
    public function storeData(FormRequest $classFormRequest, Model $model);

    /**
     * @param  FormRequest  $classFormRequest
     * @return mixed
     */
    public function storeDataTeacher(FormRequest $classFormRequest);

    /**
     * @param  FormRequest  $classFormRequest
     * @return mixed
     */
    public function storeDataStudent(FormRequest $classFormRequest);
}