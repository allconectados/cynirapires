<?php


namespace Modules\Proatec\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SecretaryStoreFormRequest extends FormRequest
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
            'code'      => 'required|string|unique:secretaries',
            'name'      => 'required|string|min:3|max:100|unique:secretaries',
            'email'      => 'required|email|min:3|max:100|unique:secretaries',
        ];
    }
}