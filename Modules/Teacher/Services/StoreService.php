<?php


namespace Modules\Teacher\Services;


use App\Services\FlashMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Admin;
use Modules\Admin\Entities\Administration;
use Modules\Admin\Entities\Coordination;
use Modules\Admin\Entities\Proatec;
use Modules\Admin\Entities\Secretary;
use Modules\Admin\Entities\Student;
use Modules\Admin\Entities\Teacher;
use Modules\Admin\Interfaces\StoreInterface;

class StoreService implements StoreInterface
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
     * StoreTicketService constructor.
     * @param  Request  $request
     * @param  FlashMessage  $message
     */
    public function __construct(Request $request, FlashMessage $message)
    {

        $this->request = $request;
        $this->message = $message;
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @param  Model  $model
     * @return mixed
     */
    public function storeData(FormRequest $classFormRequest, Model $model)
    {
        $dataForm = $this->request->all();

        $data = $model->create($dataForm);

        if ($data) {
            $this->message->storeMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->storeMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @return mixed
     */
    public function storeDataAdmin(FormRequest $classFormRequest)
    {
        $dataForm = $this->request->all();

        $data = Admin::create($dataForm);
        if ($data) {
            $this->message->storeMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->storeMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @return mixed
     */
    public function storeDataAdministration(FormRequest $classFormRequest)
    {
        $dataForm = $this->request->all();

        $data = Administration::create($dataForm);
        if ($data) {
            $this->message->storeMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->storeMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @return mixed
     */
    public function storeDataCoordination(FormRequest $classFormRequest)
    {
        $dataForm = $this->request->all();

        $data = Coordination::create($dataForm);
        if ($data) {
            $this->message->storeMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->storeMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @return mixed
     */
    public function storeDataProatec(FormRequest $classFormRequest)
    {
        $dataForm = $this->request->all();

        $data = Proatec::create($dataForm);
        if ($data) {
            $this->message->storeMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->storeMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @return mixed
     */
    public function storeDataSecretary(FormRequest $classFormRequest)
    {
        $dataForm = $this->request->all();

        $data = Secretary::create($dataForm);
        if ($data) {
            $this->message->storeMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->storeMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @return mixed
     */
    public function storeDataTeacher(FormRequest $classFormRequest)
    {
        $dataForm = $this->request->all();

        $data = Teacher::create($dataForm);
        if ($data) {
            $this->message->storeMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->storeMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @return mixed
     */
    public function storeDataStudent(FormRequest $classFormRequest)
    {
        $dataForm = $this->request->all();

        $data = Student::create($dataForm);
        if ($data) {
            $this->message->storeMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->storeMessageError();
            return redirect()->back();
        }
    }
}