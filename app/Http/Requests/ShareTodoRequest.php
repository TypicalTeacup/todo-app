<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ShareTodoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'expires' => ['required', 'date', 'date_format:Y-m-d\TH:i:s.v\Z', 'after:now']
        ];
    }

    public function expiresAt()
    {
        $expiresString = $this->input('expires');
        if (!$expiresString) {
            return null;
        }

        try {
            return Carbon::createFromFormat('Y-m-d\TH:i:s.v\Z', $expiresString);
        } catch (\Exception $ex) {
            return null;
        }
    }
}
