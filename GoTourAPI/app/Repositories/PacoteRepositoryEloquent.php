<?php

namespace App\Repositories;

use App\Models\Pacote;
use Illuminate\Http\Request;

/**
 * Class PacoteRepositoryEloquent
 * @package App\Repositories
 */
class PacoteRepositoryEloquent implements PacoteRepositoryInterface
{

    private $pacote;

    public function __construct(Pacote $pacote)
    {
        $this->pacote = $pacote;
    }

    public function indexRepository()
    {
        return $this->pacote->select(
            'id', 'name', 'price', 'date_start', 'date_end', 'image'
        )->get();
    }

    public function showRepository(int $id)
    {
        return $this->pacote->select(
            'id', 'name', 'price', 'date_start', 'date_end', 'image'
        )->where('id', $id)->get();
    }

    public function detailsRepository(int $id)
    {
        return $this->pacote->find($id);
    }

    public function createRepository(Request $request)
    {
        return $this->pacote->create($request->all());
    }

    public function editRepository(int $id, Request $request)
    {
        return $this->pacote->where('id', $id)->update($request->all());
    }

    public function deleteRepository(int $id)
    {
        $pacote = $this->pacote->find($id);

        return $pacote->delete();
    }
}