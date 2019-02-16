<?php

namespace App\Http\Controllers;

use App\Services\PacoteService;
use Illuminate\Http\Request;

class PacoteController extends Controller
{

    private $service;

    /**
     * PacoteController constructor.
     * @param PacoteService $service
     */
    public function __construct(PacoteService $service)
    {
        $this->service = $service;
    }

    /**
     * Retorna todos os Pacotes
     */
    public function index()
    {
        return $this->service->indexService();
    }

    /**
     * Retorna o Pacote por ID
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->service->showService($id);
    }

    /**
     * Cria um novo registro
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        return $this->service->storeService($request);
    }

    /**
     * Update do pacote
     *
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function edit(Request $request, int $id)
    {
        return $this->service->editService($request, $id);
    }
}