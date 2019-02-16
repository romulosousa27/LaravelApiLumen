<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface PacoteRepositoryInterface {

    
    public function indexRepository();

    public function showRepository(int $id);

    public function detailsRepository(int $id);

    public function createRepository(Request $request);

    public function editRepository(int $id, Request $request);

    public function deleteRepository(int $id);
}
