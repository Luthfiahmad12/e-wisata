<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RumahMakanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                Rule::unique('rumah_makans', 'name')->ignore($this->route('rumah_makan')),
            ],
            'fasilitas' => 'required|array|min:1|exists:fasilitas,id',
            'desc' => 'required|string',
<<<<<<< HEAD
            'menu' => 'required|array|min:1'
=======
            'menu' => 'required|string',
>>>>>>> 1c1117dc1932bd01c86c1bd638a7746d97e1d1b9
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
            'desc.required' => 'Deskripsi harus diisi.',
<<<<<<< HEAD
            'desc.string' => 'Deskripsi harus berupa teks.',
            'menu.array' => 'menu harus berupa daftar.',
            'menu.min' => 'Pilih minimal satu menu.',
=======
            'menu.required' => 'Menu harus diisi.',
>>>>>>> 1c1117dc1932bd01c86c1bd638a7746d97e1d1b9
        ];
    }
}
