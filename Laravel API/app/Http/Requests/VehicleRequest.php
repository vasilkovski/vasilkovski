<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'brand' => ['required', 'string'],
            'model' => ['required'],
            'plate_number' => ['required',],
            'insurance_date' => [ 'required']
             
        ];
    }
}
