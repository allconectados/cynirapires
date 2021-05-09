<?php


namespace Modules\Admin\Services;


use App\Models\User;
use App\Services\FlashMessage;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Admin;
use Modules\Admin\Entities\Administration;
use Modules\Admin\Entities\Coordination;
use Modules\Admin\Entities\Proatec;
use Modules\Admin\Entities\Secretary;
use Modules\Admin\Entities\Student;
use Modules\Admin\Entities\Teacher;
use Modules\Admin\Interfaces\DestroyInterface;
use RealRashid\SweetAlert\Facades\Alert;

class DestroyService implements DestroyInterface
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var FlashMessage
     */
    private $message;

    /**
     * StoreDataService constructor.
     * @param  Request  $request
     * @param  FlashMessage  $message
     */
    public function __construct(Request $request, FlashMessage $message)
    {
        $this->request = $request;
        $this->message = $message;
    }


    /**
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function destroyData($model, $id)
    {
        $data = $model->find($id);

        $destroy = $data->delete();

        if ($destroy) {
            $this->message->destroyMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->destroyMessageError();
            return redirect()->back();
        }
    }

    public function destroyDataAdministration($id)
    {
        $data = Administration::find($id);

        $destroy = $data->delete();

        if ($destroy) {
            $this->message->destroyMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->destroyMessageError();
            return redirect()->back();
        }
    }

    public function destroyDataAdmin($id)
    {
        $data = Admin::find($id);

        if ($data->is_super_admin != 1) {
            $destroy = $data->delete();

            if ($destroy) {
                $this->message->destroyMessageSuccess();
                return redirect()->back();
            } else {
                $this->message->destroyMessageError();
                return redirect()->back();
            }

        } else {
            Alert::warning('Atenção!', 'Você não pode excluír o administrador do sistema!');
            return redirect()->back();
        }
    }

    public function destroyDataProatec($id)
    {
        $data = Proatec::find($id);

        $destroy =$data->delete();

        if ($destroy) {
            $this->message->destroyMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->destroyMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroyDataCoordination($id)
    {
        $data = Coordination::find($id);

        $destroy = $data->delete();

        if ($destroy) {
            $this->message->destroyMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->destroyMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroyDataSecretary($id)
    {
        $data = Secretary::find($id);

        $destroy = $data->delete();

        if ($destroy) {
            $this->message->destroyMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->destroyMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroyDataTeacher($id)
    {
        $data = Teacher::find($id);

        $destroy = $data->delete();

        if ($destroy) {
            $this->message->destroyMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->destroyMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroyDataStudent($id)
    {
        $data = Student::find($id);

        $destroy = $data->delete();

        if ($destroy) {
            $this->message->destroyMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->destroyMessageError();
            return redirect()->back();
        }
    }
}