<?php


namespace Modules\Proatec\Services;


use App\Models\User;
use App\Services\FlashMessage;
use Illuminate\Http\Request;
use Modules\Proatec\Entities\Administration;
use Modules\Proatec\Entities\Coordination;
use Modules\Proatec\Entities\Proatec;
use Modules\Proatec\Entities\Secretary;
use Modules\Proatec\Entities\Student;
use Modules\Proatec\Entities\Teacher;
use Modules\Proatec\Interfaces\DestroyInterface;
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

    public function destroyDataProatec($id)
    {
        $data = Proatec::find($id);

        if ($data->is_super_admin != 1) {
            $data->delete();

            $destroy = User::where('code', '=', $data->code)->delete();

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