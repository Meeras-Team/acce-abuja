<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // ["super-admin", "admin", "editor", "blogger"];
        $permissions = [
            "super-admin" => [
                "role" => ['c', 'r', 'u', 'd'],
                "permission" => ['c', 'r', 'u', 'd'],
                "user" => ['c', 'r', 'u', 'd'],
                "post" => ['c', 'r', 'u', 'd'],
                "category" => ['c', 'r', 'u', 'd'],
                "enquiry" => ['c', 'r', 'u', 'd'],
                "team" => ['c', 'r', 'u', 'd'],
                "testimony" => ['c', 'r', 'u', 'd'],
            ],
            "admin" => [
                "role" => ['c', 'r', 'u'],
                "permission" => ['c', 'r', 'u'],
                "user" => ['c', 'r', 'u', 'd'],
                "post" => ['c', 'r', 'u', 'd'],
                "category" => ['c', 'r', 'u', 'd'],
                "enquiry" => ['c', 'r', 'u', 'd'],
                "team" => ['c', 'r', 'u', 'd'],
                "testimony" => ['c', 'r', 'u', 'd'],
            ],
            "editor" => [
                "post" => ['c', 'r', 'u', 'd', 'a'],
                "category" => ['c', 'r', 'u', 'd'],
            ],
            "blogger" => [
                "post" => ['c', 'r', 'u', 'd'],
                "category" => ['c', 'r', 'u', 'd'],
            ]
        ];

        // assign permision to superadmin role
        foreach ($permissions["super-admin"] as $perm => $ops) {
            foreach ($ops as $op) {
                $permission = Permission::firstOrCreate(['name' => $this->getOperation($op, $perm)]);
            }
        }

        Role::where('name', 'super-admin')->first()->givePermissionTo(Permission::all());

        foreach ($permissions["admin"] as $perm => $ops) {
            foreach ($ops as $op) {
                $permission = Permission::firstOrCreate(['name' => $this->getOperation($op, $perm)]);
                $permission->assignRole("admin"); //assign role of admin o each permission
            }
        }

        foreach ($permissions["editor"] as $perm => $ops) {
            foreach ($ops as $op) {
                $permission = Permission::firstOrCreate(['name' => $this->getOperation($op, $perm)]);
                $permission->assignRole("editor"); //assign role of admin o each permission
            }
        }

        foreach ($permissions["blogger"] as $perm => $ops) {
            foreach ($ops as $op) {
                $permission = Permission::firstOrCreate(['name' => $this->getOperation($op, $perm)]);
                $permission->assignRole("blogger"); //assign role of admin o each permission
            }
        }
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }

    function getOperation(string $val, string $perm): string
    {
        $ops = ['c' => 'create', "r" => 'read', "u" => 'update', 'b' => 'buy',  "d" => 'delete', 'a' => 'approve'];
        return $ops[$val] . " " . $perm;
    }
}
