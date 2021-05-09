<?php


namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleUpdateFormRequest extends FormRequest
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
            'time_initial' => "required|,{$this->id},id",
            'time_final' => "required|after:tomorrow,{$this->id},id",

        ];
    }
}
