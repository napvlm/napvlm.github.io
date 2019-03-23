<?php

namespace App\Http\Requests\Admin\Shops;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShopRequest extends FormRequest
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
            'city' => 'string',
            'street' => 'string',
            'phone' => 'string',
            'map_iframe' => 'string'
        ];
    }
}