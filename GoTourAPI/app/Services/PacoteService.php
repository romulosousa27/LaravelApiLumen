<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\PacoteRepositoryEloquent;

/**
 * Class PacoteService
 * @package App\Services
 */
class PacoteService
{

    /**
     * @var PacoteRepositoryEloquent
     */
    private $repository;

    /**
     * PacoteService constructor.
     * @param PacoteRepositoryEloquent $repository
     */
    public function __construct(PacoteRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function indexService()
    {
        $pacotes = $this->repository->indexRepository();

        if (count($pacotes) > 0) {
            return $pacotes;
        } else {
            return array();
        }
    }

    public function showService($id)
    {
        return $this->repository->searchPacote($id);
    }

    public function storeService(Request $request)
    {
        return $this->repository->createPacote($request);
    }

    public function editService(Request $request, int $id)
    {
        return $this->repository->editPacote($id, $request);
    }
}
