<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [
            [
                'code' => 'ADM',
                'name' => 'Admin',
                'created_at' => now(),
                'updated_at' => null
            ],
            [
                'code' => 'GUEST',
                'name' => 'Guest',
                'created_at' => now(),
                'updated_at' => null
            ],
        ];

        DB::table('roles')->insert($role);
    }
}
