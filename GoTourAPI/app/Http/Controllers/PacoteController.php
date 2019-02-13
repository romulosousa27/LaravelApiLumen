<?php

namespace App\Http\Controllers;

use App\Models\Pacote;
use App\Services\PacoteService;

class PacoteController extends Controller {

    private $service;

    /**
     * PacoteController constructor.
     * @param PacoteService $service
     */
    public function __construct(PacoteService $service) {
        $this->service = $service;
    }

    /**
     * Retorna todos os Pacotes
     */
    public function index() {
        return $this->service->searchAllPacotes();
    }

    public function show($id) {

        return $this->service->showPacote($id);
    }
}