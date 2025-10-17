<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Project_userStoreRequest extends FormRequest
{
    /**
     * 
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * 
     */
    public function rules(): array
    {
        return [
            'project_id' => ['required', 'exists:projects,id'],
            'user_id'    => ['required', 'exists:users,id'],
            'role'       => ['required', 'string', 'max:50'],
        ];
    }

    /**
     * 
     */
    public function messages(): array
    {
        return [
            'project_id.required' => 'Debe seleccionar un proyecto.',
            'project_id.exists'   => 'El proyecto seleccionado no existe.',
            'user_id.required'    => 'Debe seleccionar un usuario.',
            'user_id.exists'      => 'El usuario seleccionado no existe.',
            'role.required'       => 'El campo rol es obligatorio.',
        ];
    }
}
