<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacote extends Model {

    protected $table = 'pacote';

    protected $fillable = [
        'name', 
        'price', 
        'date_start',
        'date_end',
        'description',
        'imagem',
        'site',
        'phone',
    ];

    protected $casts = [
        'data_start' => 'Timestamps',
        'data_end' => 'Timestamps',
    ];

    /**
     * Remove os campos created_at, updated_at e delete_at da migration
     */
    public $timestamps = false; 

}