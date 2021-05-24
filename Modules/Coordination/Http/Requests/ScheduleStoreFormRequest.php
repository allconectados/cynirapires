<?php


namespace Modules\Coordination\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleStoreFormRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:50',
            'time_initial' => 'required',
            'time_final' => 'required|after:date_time_initial'
        ];
    }
}
