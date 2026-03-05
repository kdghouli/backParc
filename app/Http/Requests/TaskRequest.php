<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // À modifier selon votre système d'authentification
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => ['required', Rule::in(['low', 'medium', 'high', 'critical'])],
            'status' => ['required', Rule::in(['open', 'in_progress', 'closed'])],
            'urgence' => ['required', Rule::in(['low', 'medium', 'urgent'])],
        ];

        // Règles spécifiques pour la mise à jour
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['title'] = 'sometimes|required|string|max:255';
            $rules['priority'] = ['sometimes', 'required', Rule::in(['low', 'medium', 'high', 'critical'])];
            $rules['status'] = ['sometimes', 'required', Rule::in(['open', 'in_progress', 'closed'])];
            $rules['urgence'] = ['sometimes', 'required', Rule::in(['low', 'medium', 'urgent'])];
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Le titre est obligatoire',
            'title.max' => 'Le titre ne peut pas dépasser 255 caractères',
            'priority.in' => 'La priorité doit être low, medium, high ou critical',
            'status.in' => 'Le statut doit être open, in_progress ou closed',
            'urgence.in' => 'L\'urgence doit être low, medium ou urgent',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Nettoyer les données si nécessaire
        if ($this->has('title')) {
            $this->merge([
                'title' => trim($this->title),
            ]);
        }
    }
}
