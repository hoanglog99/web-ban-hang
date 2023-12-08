<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestProduct extends FormRequest
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
            'pro_name'          => 'required|max:190|min:3|unique:products,pro_name,'.$this->id,
            'pro_price'         => 'required|numeric|min:1',
            'pro_sale' => 'numeric|min:0|max:99',
            'pro_category_id'   => 'required',
            'pro_content'       => 'required',
            'pro_number' => 'required|numeric|min:1'
        ];
    }

    public function messages()
    {
        return [
            'pro_name.required'         => 'Dữ liệu không được để trống',
            'pro_name.unique'           => 'Dữ liệu đã tồn tại',
            'pro_name.min'                => 'Dữ liệu phải nhiều hơn 3 ký tự',
            'pro_name.max'                => 'Dữ liệu quá dài, tối đa 190 kí tự',
            'pro_price.required'         => 'Dữ liệu không được để trống',
            'pro_category_id.required'         => 'Dữ liệu không được để trống',
            'pro_content.required'         => 'Dữ liệu không được để trống',
            'pro_price.min' => 'Giá sản phẩm phải lớn hơn 0',
            'pro_sale.min' => 'Giảm giá phải thuộc khoảng 0 đến 99',
            'pro_sale.max' => 'Giảm giá phải thuộc khoảng 0 đến 99',
            'pro_number.required' => 'Dữ liệu không được để trống',
            'pro_number.min'                => 'Số lượng phải lớn hơn 0'
        ];
    }
}
