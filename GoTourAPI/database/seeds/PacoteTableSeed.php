<?php

use Illuminate\Database\Seeder;
use App\Models\Pacote;

class PacoteTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pacote::class, 25)->create();
    }
}
