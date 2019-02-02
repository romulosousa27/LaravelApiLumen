<?php

namespace App\Http\Controllers;

use App\Models\Pacote;

class PacoteController extends Controller {

    public function __construct() {
        
    }

    /**
     * Retorna todos os Pacotes
     *
     * @return void
     */
    public function index() {
        
        $pacote =  new Pacote();

        return $pacote->all();
    }
}