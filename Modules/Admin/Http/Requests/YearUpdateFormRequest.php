<?php


namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YearUpdateFormRequest extends FormRequest
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
            'title' => "required|string|min:4|max:4|unique:years,title,{$this->id},id",
        ];
    }
}
