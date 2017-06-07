<?php

namespace CornerStudio\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvatarProfileRequest extends FormRequest
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
            'x'    => ['required', 'numeric'],
            'y'    => ['required', 'numeric'],
            'w'    => ['required', 'numeric'],
            'h'    => ['required', 'numeric'],
            'file' => ['required', 'mimes:jpeg,png']
        ];
    }
}
