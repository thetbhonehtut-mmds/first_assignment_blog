<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePostRequest extends FormRequest
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
            'post_title' => "required",
            'post_detail' => "required",
            'is_published' => "required:boolean",
            'category_id' => "required",
        ];
    }

    public function validationData()
    {
        $this->merge([
            'user_id' => Auth::user()->id,
        ]);

        return $this->all();
    }
}
