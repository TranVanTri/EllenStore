<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
            'tieude'=>'required|max:100|min:6|regex: /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\d\s]+$/i',
            'des'=>'required|max:100|min:6|regex: /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\d\s]+$/i',
            'img'=>'required|max:190|min:6|regex: /^[a-zA-Z_\.\:\/\-\d]+$/i',            
        ];
    }

    public function messages()
    {
        return [
            'tieude.required'=>'Vui lòng nhập tiêu đề cho ảnh.',                
            'tieude.min'=>'Tiêu đề có độ dài 3-100 kí tự.',                
            'tieude.max'=>'Tiêu đề có độ dài 3-100 kí tự.',                
            'tieude.regex'=>'Tiêu đề chỉ bao gồm chữ thường, chữ hoa, số và dấu gạch ngang.',   
            'des.required'=>'Vui lòng nhập mô tả cho ảnh.',                
            'des.min'=>'Mô tả có độ dài 3-100 kí tự.',                
            'des.max'=>'Mô tả có độ dài 3-100 kí tự.',                
            'des.regex'=>'Mô tả chỉ bao gồm chữ thường, chữ hoa, số và dấu gạch ngang.',         
            'img.required'=>'Vui lòng nhập mô tả cho ảnh.',                
            'img.min'=>'Url có độ dài 6-100 kí tự.',                
            'img.max'=>'Url có độ dài 6-100 kí tự.',                
            'img.regex'=>'Url không hợp lệ.',
        ];
    }
}
