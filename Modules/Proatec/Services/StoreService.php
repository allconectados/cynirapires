<?php


namespace Modules\Proatec\Services;


use App\Models\User;
use App\Services\FlashMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Proatec\Entities\Administration;
use Modules\Proatec\Entities\Coordination;
use Modules\Proatec\Entities\Proatec;
use Modules\Proatec\Entities\Secretary;
use Modules\Proatec\Entities\Student;
use Modules\Proatec\Entities\Teacher;
use Modules\Proatec\Interfaces\StoreInterface;
use RealRashid\SweetAlert\Facades\Alert;

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
    public function storeDataAdministration(FormRequest $classFormRequest)
    {
        $dataForm = $this->request->all();

        $emailUser = DB::table('users')->select('email')
            ->where('email', '=', $dataForm['email'])->first();

        if (isset($emailUser)) {
            Alert::warning('Atenção!', 'Este registro já existe!');
            return redirect()->back();
        } else {
            $data = Administration::create($dataForm);
            if ($data) {
                $create = User::create($dataForm);
                if ($create) {
                    $this->message->storeMessageSuccess();
                    return redirect()->back();
                } else {
                    $this->message->storeMessageError();
                    return redirect()->back();
                }
            } else {
                $this->message->storeMessageError();
                return redirect()->back();
            }
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @return mixed
     */
    public function storeDataCoordination(FormRequest $classFormRequest)
    {
        $dataForm = $this->request->all();

        $emailUser = DB::table('users')->select('email')
            ->where('email', '=', $dataForm['email'])->first();

        if (isset($emailUser)) {
            Alert::warning('Atenção!', 'Este registro já existe!');
            return redirect()->back();
        } else {
            $data = Coordination::create($dataForm);
            if ($data) {
                $create = User::create($dataForm);
                if ($create) {
                    $this->message->storeMessageSuccess();
                    return redirect()->back();
                } else {
                    $this->message->storeMessageError();
                    return redirect()->back();
                }
            } else {
                $this->message->storeMessageError();
                return redirect()->back();
            }
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @return mixed
     */
    public function storeDataProatec(FormRequest $classFormRequest)
    {
        $dataForm = $this->request->all();

        $emailUser = DB::table('users')->select('email')
            ->where('email', '=', $dataForm['email'])->first();

        if (isset($emailUser)) {
            Alert::warning('Atenção!', 'Este registro já existe!');
            return redirect()->back();
        } else {
            $data = Proatec::create($dataForm);
            if ($data) {
                $create = User::create($dataForm);
                if ($create) {
                    $this->message->storeMessageSuccess();
                    return redirect()->back();
                } else {
                    $this->message->storeMessageError();
                    return redirect()->back();
                }
            } else {
                $this->message->storeMessageError();
                return redirect()->back();
            }
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @return mixed
     */
    public function storeDataSecretary(FormRequest $classFormRequest)
    {
        $dataForm = $this->request->all();

        $emailUser = DB::table('users')->select('email')
            ->where('email', '=', $dataForm['email'])->first();

        if (isset($emailUser)) {
            Alert::warning('Atenção!', 'Este registro já existe!');
            return redirect()->back();
        } else {
            $data = Secretary::create($dataForm);
            if ($data) {
                $create = User::create($dataForm);
                if ($create) {
                    $this->message->storeMessageSuccess();
                    return redirect()->back();
                } else {
                    $this->message->storeMessageError();
                    return redirect()->back();
                }
            } else {
                $this->message->storeMessageError();
                return redirect()->back();
            }
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @return mixed
     */
    public function storeDataTeacher(FormRequest $classFormRequest)
    {
        $dataForm = $this->request->all();

        $emailUser = DB::table('users')->select('email')
            ->where('email', '=', $dataForm['email'])->first();

        if (isset($emailUser)) {
            Alert::warning('Atenção!', 'Este registro já existe!');
            return redirect()->back();
        } else {
            $data = Teacher::create($dataForm);
            if ($data) {
                $create = User::create($dataForm);
                if ($create) {
                    $this->message->storeMessageSuccess();
                    return redirect()->back();
                } else {
                    $this->message->storeMessageError();
                    return redirect()->back();
                }
            } else {
                $this->message->storeMessageError();
                return redirect()->back();
            }
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @return mixed
     */
    public function storeDataStudent(FormRequest $classFormRequest)
    {
        $dataForm = $this->request->all();

        $emailUser = DB::table('users')->select('email')
            ->where('email', '=', $dataForm['email'])->first();

        if (isset($emailUser)) {
            Alert::warning('Atenção!', 'Este registro já existe!');
            return redirect()->back();
        } else {
            $data = Student::create($dataForm);
            if ($data) {
                $create = User::create($dataForm);
                if ($create) {
                    $this->message->storeMessageSuccess();
                    return redirect()->back();
                } else {
                    $this->message->storeMessageError();
                    return redirect()->back();
                }
            } else {
                $this->message->storeMessageError();
                return redirect()->back();
            }
        }
    }
}