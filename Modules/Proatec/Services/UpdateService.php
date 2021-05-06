<?php


namespace Modules\Proatec\Services;


use App\Models\User;
use App\Services\FlashMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Modules\Proatec\Entities\Administration;
use Modules\Proatec\Entities\Coordination;
use Modules\Proatec\Entities\Proatec;
use Modules\Proatec\Entities\Room;
use Modules\Proatec\Entities\Secretary;
use Modules\Proatec\Entities\Student;
use Modules\Proatec\Entities\Teacher;
use Modules\Proatec\Interfaces\UpdateInterface;

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
    public function updateDataStudent(FormRequest $classFormRequest, $id)
    {
        $dataForm = $this->request->all();

        $data = Student::find($id);

        $data->update($dataForm);

        $update = User::where('code', '=', $data->code)
            ->update(
                [
                    'room_id' => $this->request->input('room_id'),
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
    public function updateDataRoom(FormRequest $classFormRequest, $id)
    {
        $dataForm = $this->request->all();

        $data = Room::find($id);

        // Atualizar disciplines
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
}