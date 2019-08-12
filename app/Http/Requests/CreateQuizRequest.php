<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuizRequest extends FormRequest
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
            'suggestions' => 'required|string|max:255',
            'is_the_information_right' => 'required|in:yes,no,both',
            'fast_site' => 'required|numeric|max:5|min:1'
        ];
    }
}
