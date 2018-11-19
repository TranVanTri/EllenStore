<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [            
            'email' => 'required|email',
            'password'=>'required|min:6|max:50|regex: /^[a-zA-Z\d]+$/i',            
        ];
    }

    public function messages()
    {
        return [            
            'email.required' => 'Bạn chưa nhập Email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',           
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu có độ dài từ 6-50 ký tự.',
            'password.max'=> 'Mật khẩu có độ dài từ 6-50 ký tự.',
            'password.regex'=> 'Mật khẩu chỉ bao gồm chữ thường, chữ hoa không dấu và số.',            
        ];
    }
}
