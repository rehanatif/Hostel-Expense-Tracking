<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        if ($this->isMethod('post') && $this->route()->getName() == 'students.update') {
            $studentId = $this->input('id');
            return [
                'email' => 'required|email|unique:students,email,' . $studentId,
                'cnic' => 'required|unique:students,cnic,' . $studentId,
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'father_name' => 'required|string|max:255',
                'father_contact' => 'required|string|max:20',
                'father_occupation' => 'required|string|max:255',
                'emergency_contact' => 'required|string|max:20',
                'address' => 'required|string|max:500',
                'degree_program_id' => 'required|exists:degree_programs,id',
                'referred_by' => 'required|exists:users,id',
            ];
        } elseif ($this->isMethod('post') && $this->route()->getName() == 'students.create') {
            return [
                'email' => 'required|email|unique:students,email',
                'cnic' => 'required|unique:students,cnic',
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'father_name' => 'required|string|max:255',
                'father_contact' => 'required|string|max:20',
                'father_occupation' => 'required|string|max:255',
                'emergency_contact' => 'required|string|max:20',
                'address' => 'required|string|max:500',
                'degree_program_id' => 'required|exists:degree_programs,id',
                'referred_by' => 'required|exists:users,id',
            ];
        }
        return [];
    }
    public function messages()
    {
        return [
            'degree_program_id.required' => 'The degree program field is required.',
            'degree_program_id.exists' => 'The selected degree program is invalid.',
            'referred_by.required' => 'The referred by field is required.',
            'referred_by.exists' => 'The selected referred by is invalid.',
            'email.unique' => 'The email has already been taken.',
            'cnic.unique' => 'The CNIC has already been taken.',
            'name.required' => 'The name field is required.',
            'phone.required' => 'The phone field is required.',
            'father_name.required' => 'The father name field is required.',
            'father_contact.required' => 'The father contact field is required.',
            'father_occupation.required' => 'The father occupation field is required.',
            'emergency_contact.required' => 'The emergency contact field is required.',
            'address.required' => 'The address field is required.',
        ];
    }
}
