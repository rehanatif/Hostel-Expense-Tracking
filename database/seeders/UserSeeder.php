<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Helpers\ExoHelper as EH;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'onlyskyismylimit@gmail.com')->first();

        if (!isset($user->id)) {
            $user = User::create([
                'name'          => EH::appSettings()['business_name'],
                'email'         => 'onlyskyismylimit@gmail.com',
                'password'      => "admin@1122",
                'type'          => EH::getDefaultRoles()[0],
                'mobile'        => EH::appSettings()['contact'],
                'status'        => 'Active',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
        $role = DB::table('roles')->where('name', EH::getDefaultRoles()[0])->first();
        if (!isset($role->id)) {
            $role = ['name' => EH::getDefaultRoles()[0], 'guard_name' => EH::getDefaultGuardss()[0], 'created_at' => now(), 'updated_at' => now()]; //Admin | admin
            DB::table('roles')->insert($role);
        }
        $user->assignRole($role->id);

        $user->syncPermissions([]); // Remove All Permissions

        $permissions = Permission::orderBy('id', 'ASC')->get();
        $user->givePermissionTo($permissions);
    }
}
