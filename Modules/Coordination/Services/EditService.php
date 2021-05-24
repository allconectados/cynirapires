<?php


namespace Modules\Coordination\Services;


use Illuminate\Database\Eloquent\Model;
use Modules\Coordination\Entities\Discipline;
use Modules\Coordination\Entities\Student;
use Modules\Coordination\Entities\Teacher;
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

    /**
     * @param $id
     * @return mixed
     */
    public function editDataTeacher($id)
    {
        $data = Teacher::find($id);
        if (isset($data)) {
            return $data;
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function editDataDiscipline($id)
    {
        $data = Discipline::find($id);
        if (isset($data)) {
            return $data;
        } else {
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function editDataStudent($id)
    {
        $data = Student::find($id);
        if (isset($data)) {
            return $data;
        } else {
            return redirect()->back();
        }
    }
}