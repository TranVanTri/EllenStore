<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryProductRequest extends FormRequest
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
            'Ten'=>'required|max:100|min:2|regex: /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểếẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\d\s]+$/i',    
            'image'=>'max:190|required|regex: /^[a-zA-Z_\.\:\/\-\d]+$/i',        
        ];
    }

    public function messages()
    {
        return [
            'Ten.required'=>'Vui lòng nhập tên danh mục.',                
            'Ten.min'=>'Tên danh mục có độ dài 2-100 kí tự.',                
            'Ten.max'=>'Tên danh mục có độ dài 2-100 kí tự.',                
            'Ten.regex'=>'Tên danh mục chỉ bao gồm chữ thường, chữ hoa, số và dấu gạch ngang.',
            'image.required'=>'Vui lòng chọn ảnh cho danh mục.',                
            'image.max'=>'Url ảnh có độ dài 190 kí tự. Hãy đặt tên ảnh ngắn lại',
            'image.regex'=>'Url ảnh không hợp lệ. Xin kiểm tra lại',
        ];
    }
}
