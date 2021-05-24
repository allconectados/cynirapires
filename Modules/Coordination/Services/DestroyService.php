<?php


namespace Modules\Coordination\Services;


use App\Services\FlashMessage;
use Illuminate\Http\Request;
use Modules\Coordination\Entities\Student;
use Modules\Coordination\Entities\Teacher;
use Modules\Coordination\Interfaces\DestroyInterface;

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

    public function destroyDataAll($model)
    {
        // Retorna o valor do input checkbox
        $delete = $this->request->input('delete');

        if ($this->request->input('delete')) {
            $deletes = $model->whereIn('id', $delete)->delete();
        } else {
            $this->message->selectCheckbox();
            return redirect()->back();
        }

        if ($deletes) {
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
