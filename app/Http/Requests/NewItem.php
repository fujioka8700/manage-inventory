<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewItem extends FormRequest
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
            'inventory_title' => 'required|max:20',
            'inventory_quantity' => 'required|between:0,3',
        ];
    }

    /**
     * 入力欄の名称をカスタマイズ
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'inventory_title' => '物品名',
            'inventory_quantity' => '数量',
        ];
    }
}
