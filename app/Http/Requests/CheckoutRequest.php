<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CheckoutRequest extends Request
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

            'name' => 'required|max:255',
            'address' => 'required',
            'postcode' => 'required|max:15',
            'cardnumber' => 'required|digits_between:16,20',
            'cvv' => 'required|digits_between:3,4'
        ];
    }
}
