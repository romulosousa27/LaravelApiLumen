<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\PacoteRepositoryEloquent;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use App\Requests\ValidatePacote;

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

    public function detailService($id)
    {
        $pacote = $this->repository->detailsRepository($id);

        // verificaçao se o pacote existe
        if (is_null($pacote)) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        } else {
            return response()->json([
                'id' => $pacote->id,
                'description' => $pacote->description,
                'image' => $pacote->image,
                'site' => $pacote->site,
                'phone' => $pacote->phone,
                'pacote' => [
                    'id' => $pacote->id,
                    'name' => $pacote->name,
                    'data_start' => $pacote->data_start,
                    'date_end' => $pacote->date_end,
                    'price' => $pacote->price
                ]
            ]);
        }
    }

    public function storeService(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            ValidatePacote::RULES,
            ValidatePacote::MESSAGES
        );

        try {
            $pacote = $this->repository->createRepository($request);
            return response()->json($pacote, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Erro de Conexão com o Banco de Dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function editService(Request $request, int $id)
    {
        try {
            $pacote = $this->repository->editRepository($id, $request);
            return response()->json($pacote, Response::HTTP_ACCEPTED);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Erro de Conexão com o Banco de Dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function deleteService(int $id)
    {
        try {
            $pacote = $this->repository->deleteRepository($id);
            return response()->json(null, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Erro de Conexão com o Banco de Dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
