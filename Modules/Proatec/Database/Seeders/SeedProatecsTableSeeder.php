<?php

namespace Modules\Proatec\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeedProatecsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $data = [
            [
                'is_super_admin' => 1,
                'code' => uniqid(),
                'name' => 'José Carlos',
                'cargo' => 'Proatec',
                'email' => 'jcarneiro@prof.educacao.sp.gov.br',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'is_super_admin' => 0,
                'code' => uniqid(),
                'name' => 'William Lemos',
                'cargo' => 'Proatec',
                'email' => 'wlemos@prof.educacao.sp.gov.br',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];

        DB::table('proatecs')->insert($data);
    }
}
