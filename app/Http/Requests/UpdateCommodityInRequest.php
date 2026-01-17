<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommodityInRequest extends FormRequest
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
            'commodity_id' => 'required',
            'user_id' => 'required',
            'amount' => 'required|min:1|max:191',
            'date_in' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'commodity_id.required' => 'Kolom aset wajib diisi!',

            'user_id.required' => 'Kolom pengguna wajib diisi!',

            'amount.required' => 'Kolom jumlah wajib diisi!',
            'amount.min' => 'Kolom jumlah minimal :min karakter!',
            'amount.max' => 'Kolom jumlah maksimal :max karakter!',

            'date_in.required' => 'Kolom tanggal masuk wajib diisi!',
        ];
    }
}
