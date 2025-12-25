<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'package_id' => ['required', 'exists:packages,id'],
            'preferred_days' => ['nullable', 'array'],
            'preferred_days.*' => ['string'],
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
            'package_id.required' => __('validation.required', ['attribute' => __('messages.package')]),
            'package_id.exists' => __('validation.exists', ['attribute' => __('messages.package')]),
        ];
    }
}

