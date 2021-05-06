<?php


namespace Modules\Proatec\Services;


use Illuminate\Database\Eloquent\Model;
use Modules\Proatec\Entities\Administration;
use Modules\Proatec\Entities\Coordination;
use Modules\Proatec\Entities\Proatec;
use Modules\Proatec\Entities\Secretary;
use Modules\Proatec\Entities\Student;
use Modules\Proatec\Entities\Teacher;
use Modules\Proatec\Interfaces\EditInterface;

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