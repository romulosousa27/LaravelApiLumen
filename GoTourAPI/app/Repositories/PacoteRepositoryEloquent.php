<?php

namespace App\Repositories;

use App\Models\Pacote;
use App\Repositories\PacoteRepositoryInterface;
use Illuminate\Http\Request;

/**
 * Class PacoteRepositoryEloquent
 * @package App\Repositories
 */
class PacoteRepositoryEloquent implements PacoteRepositoryInterface {

    private $pacote;

    public function __construct(Pacote $pacote){
        $this->pacote = $pacote;
    }

    public function searchPacotes() {
        
        return $this->pacote->select(
            'id', 'name', 'price', 'date_start', 'date_end', 'image'
        )->get();
    }

    public function searchPacote(int $id) {
        
        return $this->pacote->select(
            'id', 'name', 'price', 'date_start', 'date_end', 'image'
        )->where('id', $id)->get();
    }

    public function searchDetailsPacote(int $id) {
        
        return $this->pacote->find($id);
    }

    public function createPacote(Request $request) {
        
        return $this->pacote->create($request->all());
    }

    public function editPacote(int $id, Request $request) {
        
        return $this->pacote->where('id', $id)->update($request->all());
    }

    public function deletePacote(int $id) {
        
        $pacote = Pacote::find($id);
        return $this->pacote->delete();
    }
}