<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePharmacy extends FormRequest
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
            'title'=>'required|min:5|max:50',
            'desc' => 'required|min:5|max:1000',
            'maplink' => 'required|min:5|max:1000',
            'address' => 'required|min:5|max:1000',
            'thumbnail' => 'required|mimes:jpeg,bmp,png|max:2048', 
        ];
    }
}
