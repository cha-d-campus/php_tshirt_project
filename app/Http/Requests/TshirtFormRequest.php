<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TshirtFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'model' => 'required|max:255',
            'size' => 'required|max:4',
            'img_selected' => 'required',
            'url_img' => 'required'
        ];
    }
}
