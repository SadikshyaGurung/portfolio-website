<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class projectrequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'=> 'required|integer',
            'title'=> 'required|string|max:255',
            'description' => 'required|string|max:100',
            'skill' => 'required|string|max:15',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
