<?php

namespace App\Http\Requests\Admin\Courses;

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
                    'course_id' => 'required',
                    'user_id'  => 'required|exists:users,id',
                    'level' => 'required',
                    'category' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'id' => 'required|exists:courses,id',
                    'name' => 'required|string',
                    'course_id' => 'required',
                    'user_id'  => 'required|exists:users,id',
                    'level' => 'required',
                    'category' => 'required',
                ];
            }
            default: break;
        }
    }
}
