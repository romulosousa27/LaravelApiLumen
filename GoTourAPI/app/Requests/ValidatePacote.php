<?php

namespace App\Requests;

class ValidatePacote
{
    public const RULES = [
        'name'          => 'required|max:80',
        'price'         => 'required|numeric',
        'date_start'    => 'required:date_format:"Y-m-d',
        'date_end'      => 'required|date_format:"Y-m-d',
        'description'   => 'required|string|100',
        'image'         => 'required|image',
        'site'          => 'required|string|50',
        'phone'         => 'required|numeric|max:10',
    ];

    public const MESSAGES = [
        'required'    => 'O campo :attribute é obrigatorio',
        'numeric'     => 'O valor do campo deve ser numerico',
        'date_format' => 'O formato da data deve ser no padrão americano: Y-m-d',
        'max'         => 'O :attribute deve ter no máximo :max caracteres',
        'min'         => 'O :attribute deve ter no mínimo :min caracteres'
    ];
}