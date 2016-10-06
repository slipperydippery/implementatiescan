<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateParticipantRequest extends Request
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
            'name_first' => 'required|min:2',
            'name_last' => 'required|min:2',
            'email' => 'required|email',
            'instantie' => 'required'
        ];
    }
}
