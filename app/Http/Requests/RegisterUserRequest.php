<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            'name' => ['required', 'max:50'],
            'phone' => ['required', 'digits_between:10,11'],
            'company_name' => ['required'],
            'province' => ['required'],
            'address' => ['required'],
            // 'agreement' => ['accepted']
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email đăng nhập không được để trống',
            'email.email' => 'Email không hợp lệ',
            'password.required' => 'Mật khẩu không được để trống',
            'name.required' => 'Họ và tên không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.digits_between' => 'Số điện thoại phải chứa từ 10-11 chữ số',
            'company_name.required' => 'Tên công ty không được để trống',
            'province.required' => 'Tỉnh/Thành phố không được để trống',
            'address' => 'Địa chỉ không được để trống'
        ];
    }
}
