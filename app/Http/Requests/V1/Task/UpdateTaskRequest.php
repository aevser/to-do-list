<?php

namespace App\Http\Requests\V1\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'status_id' => 'required|integer|exists:task_statuses,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'status_id.required' => trans('validations.status_id.required'),
            'status_id.integer' => trans('validations.status_id.integer'),

            'title.required' => trans('validations.title.required'),
            'title.string' => trans('validations.title.string'),
            'title.max' => trans('validations.title.max'),

            'description.required' => trans('validations.description.required'),
            'description.string' => trans('validations.description.string'),
            'description.max' => trans('validations.description.max')
        ];
    }
}
