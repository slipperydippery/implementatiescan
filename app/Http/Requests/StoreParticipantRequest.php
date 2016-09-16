<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreParticipantRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "participant['name_first']" => 'required'
        ];
    }
}


            // $user = new User();
            // $user->initial_pwd = str_random(8);
            // $user->password = Hash::make($user->initial_pwd);
            // $user->name_first = $request->participant['name_first'];
            // $user->name_last = $request->participant['name_last'];
            // $user->email = $request->participant['email'];
            // $user->save();
