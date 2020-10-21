<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'username'        => $this->username,
            'fullname'        => $this->fullname,
            'birth_of_date'   => $this->birth_of_date,
            'birth_of_place'  => $this->birth_of_place,
            'gender'          => $this->gender,
            'role'            => ($this->role == 1 ? 'Admin Member' : 'Regular Member'),
            'toke'            => $this->token,
        ];
    }
}
