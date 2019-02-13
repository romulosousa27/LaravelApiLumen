<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\PacoteRepositoryInterface;

/**
 * Class PacoteService
 * @package App\Services
 */
class PacoteService {

    /**
     * @var PacoteRepositoryInterface
     */
    private $repository;

    /**
     * PacoteService constructor.
     * @param PacoteRepositoryInterface $repository
     */
    public function __construct(PacoteRepositoryInterface $repository) {

        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function searchAllPacotes() {

        $pacotes = $this->repository->searchPacotes();

        if (count($pacotes) > 0) {
            return $pacotes;
        }
        else{
            return array();
        }
    }

    public function showPacote($id) {

        return $this->repository->searchPacote($id);
    }

    public function storePacote(Request $request) {

        return $this->repository->createPacote($request->all());
    }
}
