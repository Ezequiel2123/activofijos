<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array([
            'nombre'=>'Terror',
            'created_at'=>Carbon::now()
        ],[
            'nombre'=> 'Accion',
            'created_at'=>Carbon::now()
        ],[
            'nombre'=>'suspenso',
            'created_at'=>Carbon::now()
        ]);
        
        DB::table('categorias')->insert($data);
    }
}
