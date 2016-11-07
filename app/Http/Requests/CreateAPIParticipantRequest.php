<?php

namespace App\Http\Requests;

use App\User;
use App\Http\Requests\Request;

class CreateAPIParticipantRequest extends Request
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
        // If user doesn't exist, normal validation
        if(User::where('email', '=', Request::get('participant')['email'])->get()->count() == 0)
        {
            return [
                'participant.name_first' => 'required|min:2',
                'participant.name_last' => 'required|min:2',
                'participant.email' => 'required|email|unique:users,email',
                'participant.instantie_id' => 'required'
            ];
        } else {
            // If user exists, 2 cases:
            // case 1: user is part of the scan, return error
            $user = User::where('email', '=', Request::get('participant')['email'])->first();
            $scan = $this->route('scan');
            if($user->scans->intersect([$scan])->count())
            {
                return [
                    'participant.email' => 'required|email|unique:users,email',
                ];
            }
            // case 2: add user to the scan
            return [];
        }
    }
}
