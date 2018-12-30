<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileFormRequest extends FormRequest
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
            'emails.*' => 'email|nullable|distinct',
            'emails.0' => 'required|email',
        ];
    }

    public function messages(){
        return [
            'emails.*.required' => 'لطفا ایمیل خود را وارد نمایید.',
            'emails.*.distinct' => 'ایمیل وارد شده تکراری می باشد.',
            'emails.*.email' => 'لطفا یک ایمیل معتبر وارد نمایید.'
        ];
    }
}
