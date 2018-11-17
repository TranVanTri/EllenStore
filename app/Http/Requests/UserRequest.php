<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'Ten' => 'required|min:3|regex: /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/i',
            'Email' => 'required|email|unique:users,email',
            'Password'=>'required|min:6|max:50|regex: /^[a-zA-Z\d]+$/i',
            'PasswordAgain' => 'required|same:Password',
            'DiaChi' => 'min:3|max:100|nullable|regex: /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\d\s]+$/i',
            'SoDT' => 'max:11|nullable|min:6|regex: /^[\d]+$/i',
        ];
    }

    public function messages()
    {
        return [
            'Ten.required'=>'Bạn chưa nhập tên.',
            'Ten.min' => 'Tên có ít nhất 2 ký tự bạn nhé.',
            'Ten.regex'=>'Tên chỉ bao gồm chữ thường và chữ hoa.',
            'Email.required' => 'Bạn chưa nhập Email',
            'Email.email' => 'Bạn chưa nhập đúng định dạng email',
            'Email.unique' => 'Email đã tồn tại, vui lòng kiểm tra lại',
            'Password.required' => 'Bạn chưa nhập mật khẩu',
            'Password.min' => 'Mật khẩu có độ dài từ 6-50 ký tự.',
            'Password.max'=> 'Mật khẩu có độ dài từ 6-50 ký tự.',
            'Password.regex'=> 'Mật khẩu chỉ bao gồm chữ thường, chữ hoa không dấu và số.',
            'PasswordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'PasswordAgain.same' => 'Mật khẩu chưa trùng khớp.',
            'DiaChi.min'=> 'Địa chỉ có dộ dài từ 3-100 kí tự.',
            'DiaChi.max'=> 'Địa chỉ có dộ dài từ 3-100 kí tự.',
            'DiaChi.regex'=> 'Tên địa chỉ chỉ bao gồm chữ thường, chữ hoa số và dấu gạch ngang.',
            'SoDT.min' => 'Số điện thoại có độ dài từ 6-11 kí số.',
            'SoDT.max' => 'Số điện thoại có độ dài từ 6-11 kí số.',
            'SoDT.regex' => 'Chỉ nhập kí tự số',
        ];
    }
}
