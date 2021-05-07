<?php


namespace Modules\Proatec\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CoordinationUpdateFormRequest extends FormRequest
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
                Rule::unique('coordinations', 'code')
                    ->ignore($this->id)
            ],
            'name' => [
                'required',
                'string',
                'min:3',
                'max:100',
                Rule::unique('coordinations', 'name')
                    ->ignore($this->id)
            ],
            'cargo' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'string',
                'min:3',
                'max:100',
                Rule::unique('coordinations', 'email')
                    ->ignore($this->id)
            ],
        ];
    }
}
