<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransportasiRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                Rule::unique('penginapans', 'name')->ignore($this->route('transportasi')),
            ],
            'fasilitas' => 'required|array|min:1|exists:fasilitas,id',
            'desc' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'fasilitas.required' => 'Fasilitas harus diisi.',
            'fasilitas.array' => 'Fasilitas harus berupa daftar.',
            'fasilitas.min' => 'Pilih minimal satu fasilitas.',
            'fasilitas.exists' => 'Salah satu fasilitas yang dipilih tidak valid.',
            'desc.required' => 'Deskripsi harus diisi.'
        ];
    }
}
