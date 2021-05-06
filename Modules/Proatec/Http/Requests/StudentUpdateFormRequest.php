<?php


namespace Modules\Proatec\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentUpdateFormRequest extends FormRequest
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
                Rule::unique('students', 'code')
                    ->ignore($this->id)
            ],
            'room_id' => [
                'required',
                Rule::unique('students', 'room_id')
                    ->ignore($this->id)
            ],
            'name' => [
                'required',
                'string',
                'min:3',
                'max:100',
                Rule::unique('students', 'name')
                    ->ignore($this->id)
            ],
            'email' => [
                'required',
                'string',
                'min:3',
                'max:100',
                Rule::unique('students', 'email')
                    ->ignore($this->id)
            ],
        ];
    }
}