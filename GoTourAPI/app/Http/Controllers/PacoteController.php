<?php

namespace App\Http\Controllers;

use App\Models\Pacote;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\PacoteRepositoryInterface;
use App\Repositories\PacoteRepositoryEloquent;

class PacoteController extends Controller {

    private $repository;

    /**
     *
     * @param PacoteRepositoryInterface $repository
     */
    public function __construct(PacoteRepositoryInterface $repository) {
        
        $this->repository = $repository;
    }

    /**
     * Retorna todos os Pacotes
     *
     * @return void
     */
    public function index() {
        
        return $this->repository->searchPacotes();
    }
}