<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
        $rules = [
            'role.name' => 'required',
        ];
        $request = Request::capture();
        $userarray = $request->get('role');
        if (empty($userarray['id'])) { //new
            $rules['role.name'] = ['required', Rule::unique('roles', 'name')];
        } else { //update
            $rules['role.name'] = ['required', Rule::unique('roles', 'name')->ignore($userarray['id'])];
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'role.name.required' => 'Role name is required',
        ];
    }
}
