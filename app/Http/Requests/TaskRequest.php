<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\TaskStatus;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

/**
 * @OA\Schema(
 *     schema="TaskRequest",
 *     required={"title", "description", "status", "importance", "deadline"},
 *     @OA\Property(property="title", type="string", example="Пример задачи"),
 *     @OA\Property(property="description", type="string", example="Описание задачи"),
 *     @OA\Property(property="status", type="string", enum={"TODO", "IN_PROGRESS", "COMPLETED"}),
 *     @OA\Property(property="importance", type="integer", example=3),
 *     @OA\Property(property="deadline", type="string", format="date-time", example="2025-04-20 12:00:00")
 * )
 */
class TaskRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'status' => [
            'required',
                Rule::in(array_column(TaskStatus::cases(), 'value')),
            ],
            'importance' => 'required|integer|min:1|max:5',
            'deadline' => 'required|date_format:Y-m-d H:i:s',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле :attribute обязательно.',
            'title.string' => 'Поле :attribute должно быть строкой.',
            'title.max' => 'Длина :attribute должна быть не более :max знаков.',
            'description.required' => 'Поле :attribute обязательно.',
            'description.string' => 'Поле :attribute должно быть строкой.',
            'description.max' => 'Длина :attribute должна быть не более :max знаков.',
            'status.required' => 'Поле :attribute обязательно.',
            'status.in' => 'Поле :attribute должно быть одним из значений - :values.',
            'importance.required' => 'Поле :attribute обязательно.',
            'importance.integer' => 'Поле :attribute должно быть числом.',
            'importance.min' => 'Минимальное значение для поля :attribute — :min.',
            'importance.max' => 'Максимальное значение для поля :attribute — :max.',
            'deadline.required' => 'Поле :attribute обязательно.',
            'deadline.date_format' => 'Неверный формат поля :attribute (ожидается: :format).',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'заголовок',
            'description' => 'описание',
            'status' => 'статус',
            'importance' => 'важность',
            'deadline' => 'дедлайн',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
