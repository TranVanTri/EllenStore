<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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
            'Ten'=>'required|max:3|min:1|regex: /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\d\s]+$/i',
            
        ];
    }

    public function messages()
    {
        return [
            'Ten.required'=>'Vui lòng nhập tên nhóm danh mục.',                
            'Ten.min'=>'Tên nhóm danh mục có độ dài 1-3 kí tự.',                
            'Ten.max'=>'Tên nhóm danh mục có độ dài 1-3 kí tự.',                
            'Ten.regex'=>'Tên nhóm danh mục chỉ bao gồm chữ thường, chữ hoa, số và dấu gạch ngang.',           

        ];
    }
}
