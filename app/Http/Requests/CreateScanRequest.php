<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateScanRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //temp true
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
            'title' => 'required|min:3',
            'regio' => 'required|min:3',
            'name_first' => 'required|min:2',
            'name_last' => 'required|min:2',
            'beheerder_email' => 'required|email',
            'instantie' => 'required',
            'datedeeleen' => 'required'
        ];
    }
}
