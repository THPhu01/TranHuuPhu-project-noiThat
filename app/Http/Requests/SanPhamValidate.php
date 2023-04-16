<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamValidate extends FormRequest
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
            'tenSP' => 'required|min:3',
            'img' => 'mimes:jpeg,png,jpg|max:2048',
            'giaGoc' => 'required|max:10|min:6',
            'giaKM' => 'required',
            'soLuong' => 'required',
            'tinhTrang' => 'required',
            'moTa' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'tenSP.required' => 'Vui lòng không bỏ trống !',
            'tenSP.min' => 'Vui lòng nhập nhiều hơn 3 ký tự !',
            'img.mimes' => 'Chỉ chọn ảnh JPEG , PNG , JPG',
            'giaGoc.required' => 'Vui lòng không bỏ trống !',
            'giaGoc.max' => 'Tối đa 10 chữ số',
            'giaGoc.min' => 'Tối thiểu 6 chữ số',
            'giaKM.required' => 'Vui lòng không bỏ trống !',
            'soLuong.required' => 'Vui lòng không bỏ trống !',
            'giaKM.required' => 'Vui lòng không bỏ trống !',
            'soLuong.required' => 'Vui lòng không bỏ trống !',
            'moTa.required' => 'Vui lòng không bỏ trống !',
        ];
    }
}
