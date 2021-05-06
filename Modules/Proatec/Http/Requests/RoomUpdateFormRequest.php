<?php


namespace Modules\Proatec\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoomUpdateFormRequest extends FormRequest
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
            'year_id' => [
                'required'
            ],
            'stage_id' => [
                'required'
            ],
            'code' => [
                'required',
                'string',
                Rule::unique('rooms', 'code')
                    ->ignore($this->id)
            ],
            'title' => [
                'required',
                'string',
            ],
        ];
    }
}