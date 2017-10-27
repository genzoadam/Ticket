<?php

namespace App\Http\Requests;


class UpdatePesawatRequest extends StorePesawatRequest
{

    public function rules()
    {
        return [
            'name' => 'required|unique:pesawats,name,' 
        ];
    }
}
