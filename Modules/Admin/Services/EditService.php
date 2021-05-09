<?php


namespace Modules\Admin\Services;


use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Administration;
use Modules\Admin\Entities\Coordination;
use Modules\Admin\Entities\Discipline;
use Modules\Admin\Entities\Proatec;
use Modules\Admin\Entities\Secretary;
use Modules\Admin\Entities\Student;
use Modules\Admin\Entities\Teacher;
use Modules\Admin\Interfaces\EditInterface;

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
    public function editDataAdministration($id)
    {
        $data = Administration::find($id);
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
    public function editDataCoordination($id)
    {
        $data = Coordination::find($id);
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
    public function editDataProatec($id)
    {
        $data = Proatec::find($id);
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
    public function editDataSecretary($id)
    {
        $data = Secretary::find($id);
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