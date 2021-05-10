<?php


namespace Modules\Admin\Services;


use App\Models\User;
use App\Services\FlashMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Modules\Admin\Entities\Administration;
use Modules\Admin\Entities\Coordination;
use Modules\Admin\Entities\Discipline;
use Modules\Admin\Entities\Proatec;
use Modules\Admin\Entities\Room;
use Modules\Admin\Entities\Secretary;
use Modules\Admin\Entities\Student;
use Modules\Admin\Entities\Teacher;
use Modules\Admin\Interfaces\UpdateInterface;

class UpdateService implements UpdateInterface
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
     * @param  FormRequest  $classFormRequest
     * @param  Model  $model
     * @param $id
     *
     * @return mixed
     */
    public function updateData(FormRequest $classFormRequest, Model $model, $id)
    {
        $dataForm = $this->request->all();

        $data = $model->find($id);

        $update = $data->update($dataForm);

        if ($update) {
            $this->message->updateMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->updateMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @param $id
     *
     * @return mixed
     */
    public function updateDataAdministration(FormRequest $classFormRequest, $id)
    {
        $dataForm = $this->request->all();

        $data = Administration::find($id);

        $data->update($dataForm);

        $update = User::where('code', '=', $data->code)
            ->update(
                [
                    'name' => $this->request->input('name'),
                    'email' => $this->request->input('email')
                ]);

        if ($update) {
            $this->message->updateMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->updateMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @param $id
     * @return mixed
     */
    public function updateDataCoordination(FormRequest $classFormRequest, $id)
    {
        $dataForm = $this->request->all();

        $data = Coordination::find($id);

        $data->update($dataForm);

        $update = User::where('code', '=', $data->code)
            ->update(
                [
                    'name' => $this->request->input('name'),
                    'email' => $this->request->input('email')
                ]);

        if ($update) {
            $this->message->updateMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->updateMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @param $id
     * @return mixed
     */
    public function updateDataProatec(FormRequest $classFormRequest, $id)
    {
        $dataForm = $this->request->all();

        $data = Proatec::find($id);

        $data->update($dataForm);

        $update = User::where('code', '=', $data->code)
            ->update(
                [
                    'name' => $this->request->input('name'),
                    'email' => $this->request->input('email')
                ]);

        if ($update) {
            $this->message->updateMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->updateMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @param $id
     * @return mixed
     */
    public function updateDataSecretary(FormRequest $classFormRequest, $id)
    {
        $dataForm = $this->request->all();

        $data = Secretary::find($id);

        $data->update($dataForm);

        $update = User::where('code', '=', $data->code)
            ->update(
                [
                    'name' => $this->request->input('name'),
                    'email' => $this->request->input('email')
                ]);

        if ($update) {
            $this->message->updateMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->updateMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @param $id
     * @return mixed
     */
    public function updateDataTeacher(FormRequest $classFormRequest, $id)
    {
        $dataForm = $this->request->all();

        $data = Teacher::find($id);

        $data->update($dataForm);

        // Atualizar disciplines
        $update = $data->disciplines()->sync($this->request->get('disciplines'));

        if ($update) {
            $this->message->updateMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->updateMessageError();
            return redirect()->back();
        }
    }


    public function updateDataTeacherRoom(FormRequest $classFormRequest, $id)
    {
        $dataForm = $this->request->all();

        $data = Teacher::find($id);

        $data->update($dataForm);

        // Atualizar turmass
        $update = $data->rooms()->sync($this->request->get('rooms'));

        if ($update) {
            $this->message->updateMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->updateMessageError();
            return redirect()->back();
        }
    }


    /**
     * @param FormRequest $classFormRequest
     * @param Model $model
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function updateDataStudent($classFormRequest, Model $model, $id)
    {
        $dataForm = $this->request->all();

        $data = $model->find($id);

        if ($this->request->get('status') == 'Remanejamento' || $this->request->get('status') == 'TROCA NÃO OFICIAL') {
            $create = $data->create(
                [
                    'active' => 1,
                    'room' => $this->request->room,
                    'number' => $this->request->number,
                    'name' => $this->request->name,
                    'username' => $this->request->username,
                    'ra' => $this->request->ra,
                    'ra_digit' => $this->request->ra_digit,
                    'date_of_birth' => $this->request->date_of_birth,
                    'email_google' => $this->request->email_google,
                    'email_microsoft' => $this->request->email_microsoft,
                    'status' => 'Ativo',
                    'password' => $data->password,
                ]
            );
            if ($create) {
                $data->update(['status' => $this->request->status, 'active' => 0]);
                $this->message->studentRemanejadoSuccess();
                return redirect()->back();
            } else {
                $this->message->studentRemanejadoError();
                return redirect()->back();
            }


        } else {
            $update = $data->update($dataForm);

            if ($update) {
                $this->message->updateMessageSuccess();
                return redirect()->back();
            } else {
                $this->message->updateMessageError();
                return redirect()->back();
            }
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @param $id
     * @return mixed
     */
    public function updateDataDiscipline(FormRequest $classFormRequest, $id)
    {
        $dataForm = $this->request->all();

        $data = Discipline::find($id);

        // Atualizar tabela pivot discipline_teacher
        $data->teachers()->sync($this->request->get('teachers'));

        //Altera os dados de registro no banco
        $update = $data->update($dataForm);

        if ($update) {
            $this->message->updateMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->updateMessageError();
            return redirect()->back();
        }
    }

    /**
     * @param  FormRequest  $classFormRequest
     * @param $id
     * @return mixed
     */
    public function updateDataRoom(FormRequest $classFormRequest, $id)
    {
        $dataForm = $this->request->all();

        $data = Room::find($id);

        // Atualizar tabela pivot room_teacher
        $data->teachers()->sync($this->request->get('teachers'));

//        dd($data);

        //Altera os dados de registro no banco
        $update = $data->update($dataForm);

        if ($update) {
            $this->message->updateMessageSuccess();
            return redirect()->back();
        } else {
            $this->message->updateMessageError();
            return redirect()->back();
        }
    }
}
