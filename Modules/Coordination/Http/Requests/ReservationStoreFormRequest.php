<?php


namespace Modules\Coordination\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'year_id' => 'required|string',
            'stage_id' => 'required|string',
            'sala_id' => 'required|string',
            'schedule_id' => 'required|string',
            'teacher_id' => 'required|string',
            'aula' => 'required|string',
            'start' => 'required|date',
            'end' => 'required|date',
        ];
    }
}
