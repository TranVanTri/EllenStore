<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
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
            'email'=>'required|email|max:30',
            'phone'=>'required|regex:/^\d{4,11}$/i',
            'addRess'=>'required|max:100|regex: /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\d\s]+$/i'
        ];
    }

     public function messages()
    {
        return [
            'email.required'=>'Vui lòng nhập email.',                
            'email.email'=>'Email không hợp lệ.',                
            'email.max'=>'Email có độ dài từ 10-30 kí tự.',
            'phone.regex'=>'Số điện thoại không hơp lệ.',
            'phone.required'=>'Vui lòng nhập số điện thoại.',

            'addRess.required'=>'Vui lòng nhập địa chỉ.',
            'addRess.regex'=>'Địa chỉ chỉ bao gồm chữ thường, chữ hoa, số và dấu gạch ngang.',
            'addRess.max'=>'Địa chỉ có độ dài không quá 100 kí tự.'
            
        ];
    }
}
