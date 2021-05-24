<?php


namespace Modules\Coordination\Services;


use App\Services\FlashMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Modules\Coordination\Entities\Student;
use Modules\Coordination\Entities\Teacher;
use Modules\Coordination\Interfaces\StoreInterface;

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