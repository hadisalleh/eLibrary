<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required',
            'isbn'          => 'required',
            'author'        => 'required',
            'published_date'=> 'required',
            'quantity'      => 'required|numeric',
            'description'   => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Sila masukkan tajuk',
            'isbn.required'             => 'Sila masukkan ISBN',
            'author.required'           => 'Sila masukkan pengarang',
            'published_date.required'   => 'Sila pilih tarikh diterbit',
            'quantity.required'         => 'Nyatakan bilangan buku',
            'quantity.numeric'          => 'Nyatakan nombor dibenarkan',
            'description.required'      => 'Sila masukkan maklumat berkaitan',
            'description.min'           => 'Harus melebihi 10 aksara',
        ];
    }

}
