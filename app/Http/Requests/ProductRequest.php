<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required|max:100|min:3|regex: /^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\d\s]+$/i',
            'price'=>'required|regex:/^\d{4,10}$/i',
            'sale'=>'required|regex:/^\d{1,10}$/i',
            // 'size'=>'max:2|required|regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/i',
            'color'=>'max:5|required|regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/i',
            'describe'=>'required|max:100|min:80|regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\-\d\s]+$/i', 
            'avatar'=>'max:190|required|regex: /^[a-zA-Z_\.\:\/\-\d]+$/i',
            'otherimg.*'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên sản phẩm.',                
            'name.min'=>'Tên sản phẩm có độ dài 3-100 kí tự.',                
            'name.max'=>'Tên sản phẩm có độ dài 3-100 kí tự.',                
            'name.regex'=>'Tên sản phẩm chỉ bao gồm chữ thường, chữ hoa, số và dấu gạch ngang.',

            'price.regex'=>'Giá sản phẩm không âm và có 4-10 kí số ',
            'price.required'=>'Vui lòng nhập giá sản phẩm.',

            'sale.regex'=>'Giá giảm giá của sản phẩm không âm và có 1-10 kí số trở lên',
            'sale.required'=>'Vui lòng nhập giá sản phẩm.',

            'color.required'=>'Vui lòng nhập màu cho sản phẩm.',
            'color.regex'=>'Chỉ nhập chữ thường và chữ hoa.',
            'color.max'=>'Màu sản phẩm có độ dài 1-5 kí tự.',

            // 'size.required'=>'Vui lòng nhập màu cho sản phẩm.',
            // 'size.regex'=>'Chỉ nhập chữ thường và chữ hoa.',
            // 'size.max'=>'Màu sản phẩm có độ dài 1-2 kí tự.',

            'describe.required'=>'Vui lòng nhập mô tả sản phẩm.',                
            'describe.min'=>'Mô tả sản phẩm có độ dài 80-100 kí tự.',                
            'describe.max'=>'Mô tả sản phẩm có độ dài 80-100 kí tự.',                
            'describe.regex'=>'Mô tả sản phẩm chỉ bao gồm chữ thường, chữ hoa, số và dấu gạch ngang.',

            'avatar.required'=>'Vui lòng chọn ảnh sản phẩm.',                
            'avatar.max'=>'Url ảnh sản phẩm có độ dài 190 kí tự.',
            'avatar.regex'=>'Url ảnh sản phẩm không hợp lệ. Xin kiểm tra lại',

            'otherimg.*.required'=>'Vui lòng chọn ảnh sản phẩm mục ảnh sản phẩm khác.'
            // 'otherimg*.regex'=>'Url "Các ảnh khác" không hợp lệ. Vui lòng kiểm trả lại.',

        ];
    }
}
