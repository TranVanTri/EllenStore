<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            'email' => 'required|email',
            'Password'=>'required|min:6|max:50|regex: /^[a-zA-Z\d]+$/i',            
        ];
    }

    public function messages()
    {
        return [            
            'email.required' => 'Bạn chưa nhập Email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',           
            'Password.required' => 'Bạn chưa nhập mật khẩu',
            'Password.min' => 'Mật khẩu có độ dài từ 6-50 ký tự.',
            'Password.max'=> 'Mật khẩu có độ dài từ 6-50 ký tự.',
            'Password.regex'=> 'Mật khẩu chỉ bao gồm chữ thường, chữ hoa không dấu và số.',            
        ];
    }
}
