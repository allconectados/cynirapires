<?php


namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeriodUpdateFormRequest extends FormRequest
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
            'serie_id' => 'required|string',
            'date_initial' => 'required|date',
            'date_final' => 'required|date',
            'title' => "required|string|min:3|max:200|unique:periods,title,{$this->id},id",
        ];
    }
}
