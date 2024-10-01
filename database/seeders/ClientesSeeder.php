<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = array([
            'nombre'=>'Juan',
            'edad'=>50,
            'categoria'=> 1,
            'created_at'=>Carbon::now()
        ],[
            'nombre'=>'luis',
            'edad'=>35,
            'categoria'=> 2,
            'created_at'=>Carbon::now()
        ]);
        
        DB::table('clientes')->insert($data);
    }
}
