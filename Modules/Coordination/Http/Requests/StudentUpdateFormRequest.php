<?php


namespace Modules\Coordination\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'active' => 'required|boolean',
            'number' => 'required|numeric',
            'room' => 'required|string',
            'name' => 'required|string|min:3|max:100',
            'username' => 'required|string|min:3|max:100',
            'ra' => 'required|string|min:2|max:50',
            'ra_digit' => 'required|string|min:1|max:3',
            'email_microsoft' => 'required|email',
            'email_google' => 'required|email',
            'date_of_birth' => 'required|date',
            'status' => 'required|string|min:2|max:100'
        ];
    }
}
