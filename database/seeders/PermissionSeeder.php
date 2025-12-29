<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Helpers\GourmetGlobalHelper as GGH;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();


        $count = -1;
        // DASHBOARD PERMISSION

        $data[++$count] = ["module" => "All", "name" => "All", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()]; // For Admin

        $data[++$count] = ["module" => "Dashboard", "name" => "View Dashboard", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];

        // CUSTOMER PERMISSIONS
        $data[++$count] = ["module" => "Student", "name" => "View Students", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];

        $data[++$count] = ["module" => "Student", "name" => "Create Student", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];

        $data[++$count] = ["module" => "Student", "name" => "Update Student", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];

        $data[++$count] = ["module" => "Student", "name" => "Delete Student", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];

        $data[++$count] = ["module" => "Student", "name" => "Change Student Status", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];
        // SUPPLIER PERMISSIONS
        $data[++$count] = ["module" => "Referral", "name" => "View Referrals", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];

        $data[++$count] = ["module" => "Referral", "name" => "Create Referral", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];

        $data[++$count] = ["module" => "Referral", "name" => "Update Referral", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];

        $data[++$count] = ["module" => "Referral", "name" => "Delete Referral", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];

        $data[++$count] = ["module" => "Referral", "name" => "Change Referral Status", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];
        // WAREHOUSE PERMISSIONS
        $data[++$count] = ["module" => "Transaction", "name" => "View Transactions", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];

        $data[++$count] = ["module" => "Transaction", "name" => "Create Transaction", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];

        $data[++$count] = ["module" => "Transaction", "name" => "Update Transaction", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];

        $data[++$count] = ["module" => "Transaction", "name" => "Delete Transaction", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];

        $data[++$count] = ["module" => "Transaction", "name" => "Change Transaction Status", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];

        $data[++$count] = ["module" => "Transaction", "name" => "View Transaction Detail", "guard_name" => 'web', "created_at" => now(), "updated_at" => now()];

        // INSERT PERMISSIONS IF NOT ALREADY EXIST.
        foreach ($data as $rows) {
            if (DB::table('permissions')->where('name', $rows['name'])->count() == 0) {
                DB::table('permissions')->insert($rows);
            }
        }

        $user = User::where('email', 'onlyskyismylimit@gmail.com')->first();

        if (isset($user->id)) {
            $user->syncPermissions([]); // Remove All Permissions

            $permissions = Permission::orderBy('id', 'ASC')->get();
            $user->givePermissionTo($permissions);
        }
    }
}
