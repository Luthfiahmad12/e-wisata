<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:users,email'],
            'password' => ['required', 'string'],
            'photo' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'jk' => ['required', 'in:m,f'],
            'telepon' => ['required', 'min:9', 'max:12'],
            'address' => ['required']
        ];
    }

    /**
     * Custom error messages for validation rules.
     * Pesan kesalahan kustom untuk aturan validasi.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.string' => 'Nama lengkap harus berupa teks.',

            'email.required' => 'Alamat email wajib diisi.',
            'email.string' => 'Alamat email harus berupa teks.',
            'email.unique' => 'Alamat email telah terdaftar. Harap gunakan yang lain.',

            'password.required' => 'Kata sandi wajib diisi.',
            'password.string' => 'Kata sandi harus berupa teks.',

            'photo.required' => 'Foto profil wajib diunggah.',
            'photo.image' => 'File yang diunggah harus berupa gambar.',
            'photo.mimes' => 'Format foto profil tidak didukung. Gunakan format PNG, JPG, atau JPEG.',
            'photo.max' => 'Ukuran foto profil maksimal 2048 KB (2MB).',

            'jk.required' => 'Jenis kelamin wajib dipilih.',
            'jk.in' => 'Pilihan jenis kelamin tidak valid.', // Asumsi nilai yang valid hanya 'm' dan 'f'

            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.min' => 'Nomor telepon minimal :min digit.', // :min akan diganti angka dari aturan validasi
            'telepon.max' => 'Nomor telepon maksimal :max digit.', // :max akan diganti angka dari aturan validasi

            'address.required' => 'Alamat lengkap wajib diisi.',
        ];
    }
}
