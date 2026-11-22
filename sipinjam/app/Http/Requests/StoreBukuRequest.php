<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBukuRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kode_buku' => 'required|string|max:20|unique:bukus,kode_buku',
            'judul'     => 'required|string|min:3|max:150',
            'penulis'   => 'required|string|max:100',
            'stok'      => 'required|integer|min:0',
            'kategori'  => 'required|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'kode_buku.required' => 'Kode buku wajib diisi.',
            'kode_buku.unique'   => 'Kode buku sudah terdaftar.',
            'judul.required'     => 'Judul buku wajib diisi.',
            'judul.min'          => 'Judul buku minimal harus 3 karakter.',
            'stok.min'           => 'Stok tidak boleh bernilai negatif.',
        ];
    }
}
