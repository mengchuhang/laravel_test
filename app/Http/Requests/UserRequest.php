<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
class UserRequest extends Request
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
            'name' => 'required|unique:user',
            'age' => 'required|integer',
            'email' => 'required|email',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户名必须填写',
            'name.unique' => '用户名已存在',
            'age.required' => '年龄必须填写',
            'age.integer' => '年龄不合法',
            'email.required' => '邮箱必须填写',
            'email.email' => '邮箱不合法',
            'phone.required' => '手机号必须填写',
        ];
    }
}
