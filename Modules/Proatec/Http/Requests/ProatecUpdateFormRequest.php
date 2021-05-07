<?php


namespace Modules\Proatec\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProatecUpdateFormRequest extends FormRequest
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
            'is_super_admin' => [
                'required',
                'boolean',
                Rule::unique('proatecs', 'is_super_admin')
                    ->ignore($this->id)
            ],
            'code' => [
                'required',
                'string',
                Rule::unique('proatecs', 'code')
                    ->ignore($this->id)
            ],
            'name' => [
                'required',
                'string',
                'min:3',
                'max:100',
                Rule::unique('proatecs', 'name')
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
                Rule::unique('proatecs', 'email')
                    ->ignore($this->id)
            ],
        ];
    }
}
