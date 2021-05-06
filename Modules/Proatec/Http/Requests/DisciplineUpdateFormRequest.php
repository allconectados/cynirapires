<?php


namespace Modules\Proatec\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DisciplineUpdateFormRequest extends FormRequest
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
            'code' => [
                'required',
                'string',
                Rule::unique('disciplines', 'code')
                    ->ignore($this->id)
            ],
            'title' => [
                'required',
                'string',
                Rule::unique('disciplines', 'title')
                    ->ignore($this->id)
            ],
        ];
    }
}