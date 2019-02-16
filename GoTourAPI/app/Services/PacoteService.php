<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\PacoteRepositoryEloquent;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;

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
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function indexService()
    {
        try {
            $pacotes = $this->repository->indexRepository();

            if (count($pacotes) > 0) {
                return response()->json($pacotes, Response::HTTP_OK);
            } else {
                return array();
            }
        } catch (QueryException $e) {
            return response()->json(['error' => 'Erro de Conexão com o Banco de Dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showService($id)
    {
        try {
            $pacote = $this->repository->showRepository($id);

            if (count($pacote) > 0) {
                return response()->json($pacote, Response::HTTP_OK);
            } else {
                return response()->json(null, Response::HTTP_NOT_FOUND);
            }
        } catch (QueryException $e) {
            return response()->json(['error' => 'Erro de Conexão com o Banco de Dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function storeService(Request $request)
    {
        return $this->repository->createRepository($request);
    }

    public function editService(Request $request, int $id)
    {
        return $this->repository->editRepository($id, $request);
    }

    public function deleteService(int $id)
    {
        return $this->repository->deleteRepository($id);
    }
}
