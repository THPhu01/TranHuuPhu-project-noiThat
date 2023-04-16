<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TinTucValidate extends FormRequest
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
            'tieu_de' => 'required|min:3',
            'file_upload' => 'required|mimes:jpeg,png,jpg|max:2048',
            'tom_tat' => 'required',
            'noi_dung' => 'required',
            'views' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'tieu_de.required' => 'Vui lòng không bỏ trống !',
            'tieu_de.min' => 'Vui lòng nhập nhiều hơn 3 ký tự !',
            'file_upload.required' => 'Vui lòng chọn ảnh !',
            'file_upload.mimes' => 'Chỉ chọn ảnh JPEG , PNG , JPG',
            'tom_tat.required' => 'Vui lòng không bỏ trống !',
            'noi_dung.required' => 'Vui lòng không bỏ trống !',
            'views.required' => 'Vui lòng không bỏ trống !',
        ];
    }
}
