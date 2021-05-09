<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeedAdminsTableSeeder extends Seeder
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
                'ano' => date('Y'),
                'code' => uniqid(),
                'name' => 'José Carlos',
                'cargo' => 'Admin',
                'email' => 'cyniraproatec@gmail.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];

        DB::table('admins')->insert($data);
    }
}
