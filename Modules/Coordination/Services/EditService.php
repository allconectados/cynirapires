<?php


namespace Modules\Coordination\Services;


use Illuminate\Database\Eloquent\Model;
use Modules\Coordination\Interfaces\EditInterface;

class EditService implements EditInterface
{
    /**
     * @param  Model  $model
     * @param $id
     * @return mixed
     */
    public function editData(Model $model, $id)
    {
        $data = $model->find($id);
        if (isset($data)) {
            return $data;
        } else {
            return redirect()->back();
        }
    }
}