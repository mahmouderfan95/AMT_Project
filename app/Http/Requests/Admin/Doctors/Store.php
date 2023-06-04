<?php

namespace App\Http\Requests\Admin\Doctors;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name' => 'required|string',
                    'staff_id' => 'required',
                    'email'  => 'required|email|unique:users,email',
                    'password' => 'min:6|max:10',
                    'image' => 'required|mimes:jpg,jpeg,png,gif|max:2000',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'id' => 'required|exists:users,id',
                    'name' => 'required|string',
                    'staff_id' => 'required',
                    'email' => 'required|email',
                    'password' => 'nullable|min:6|max:10',
                    'image' => 'nullable|mimes:jpg,jpeg,png,gif|max:2000',
                ];
            }
            default: break;
        }
    }
}
