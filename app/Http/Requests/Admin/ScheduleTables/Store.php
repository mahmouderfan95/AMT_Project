<?php

namespace App\Http\Requests\Admin\ScheduleTables;

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
                    'course_id' => 'required',
                    'user_id'  => 'required|exists:users,id',
//                    'start_from_time' => 'required',
//                    'end_in_time' => 'required',
//                    'start_from_date' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'id' => 'required|exists:schedule_tables,id',
                    'course_id' => 'required',
                    'user_id'  => 'required|exists:users,id',
//                    'start_from_time' => 'required',
//                    'end_in_time' => 'required',
//                    'start_from_date' => 'required',
                ];
            }
            default: break;
        }
    }
}
