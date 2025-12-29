<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Helpers\ExoHelper as EH;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = array();

        $count = 0;

        foreach (EH::getDefaultRoles() as $key => $role) {
            $roles[++$count] = ['name' => $role, 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]; //Admin | admin
        }

        foreach ($roles as $rows) {
            if (DB::table('roles')->where('name', $rows['name'])->count() == 0) {
                DB::table('roles')->insert($rows);
            }
        }

        // Admin Role not need to alot Permissions, because I have created gate in boot function for admin role. admin can access every thing
    }
}
