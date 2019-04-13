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
            'tieude'=>'required|max:100|min:2|regex: /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểếẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\d\s\/]+$/i',
            // 'link'=>'required|max:100|min:6|regex: /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểếẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\d\s]+$/i',
            'link'=>'required|max:100|min:6',
            'image'=>'required|max:190|min:6|regex: /^[a-zA-Z_\.\:\/\-\d]+$/i',            
        ];
    }

    public function messages()
    {
        return [
            'tieude.required'=>'Vui lòng nhập tiêu đề cho ảnh.',                
            'tieude.min'=>'Tiêu đề có độ dài 2-100 kí tự.',                
            'tieude.max'=>'Tiêu đề có độ dài 2-100 kí tự.',                
            'tieude.regex'=>'Tiêu đề chỉ bao gồm chữ thường, chữ hoa, số và dấu gạch ngang.',   
            'link.required'=>'Vui lòng nhập liên kết.',                
            'link.min'=>'Mô tả có độ dài 3-100 kí tự.',                
            'link.max'=>'Mô tả có độ dài 3-100 kí tự.',                
            //'link.regex'=>'Mô tả chỉ bao gồm chữ thường, chữ hoa, số và dấu gạch ngang.',         
            'image.required'=>'Vui lòng chọn ảnh.',                
            'image.min'=>'Url có độ dài 6-100 kí tự.',                
            'image.max'=>'Url có độ dài 6-100 kí tự.',                
            'image.regex'=>'Url không hợp lệ.',
        ];
    }
}
