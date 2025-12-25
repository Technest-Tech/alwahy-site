<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'whatsapp' => ['required', 'string', 'max:20'],
            'message' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('validation.required', ['attribute' => __('messages.name')]),
            'email.required' => __('validation.required', ['attribute' => __('messages.email')]),
            'email.email' => __('validation.email'),
            'whatsapp.required' => __('validation.required', ['attribute' => __('messages.whatsapp')]),
        ];
    }
}

