<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

class StoreTodoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority' => ['required', 'in:low,medium,high'],
            'status' => ['required', 'in:toDo,inProgress,done'],
            'deadline' => [
                'required',
                'date',
                'date_format:Y-m-d\TH:i:s.v\Z',
                // 'after:now' if the status isn't done
                function ($attribute, $value, $fail) {
                    if ($this->status !== 'done' && Carbon::parse($value)->isPast()) {
                        $fail('The deadline must be after now.');
                    }
                },
            ],
        ];
    }
}
