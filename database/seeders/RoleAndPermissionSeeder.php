<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Role::truncate();
        Permission::truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('role_has_permissions')->truncate();

        $roles = ['superadmin', 'admin_koordinator', 'admin_finance', 'teknisi', 'pelanggan'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $superadmin = Role::where(['name' => 'superadmin'])->first();
        $adminKoordinator = Role::where(['name' => 'admin_koordinator'])->first();
        $adminFinance = Role::where(['name' => 'admin_finance'])->first();
        $teknisi = Role::where(['name' => 'teknisi'])->first();
        $pelanggan = Role::where(['name' => 'pelanggan'])->first();

        $permissions = [
            'users-create', 'users-read', 'users-update', 'users-delete',
            'service-create', 'service-read', 'service-update', 'service-delete',
            'complain-create', 'complain-read', 'complain-update', 'complain-delete',
            'subcription-create', 'subcription-read', 'subcription-update', 'subcription-delete',
            'bills-create', 'bills-read', 'bills-update', 'bills-delete',
            'payment-create', 'payment-read', 'payment-update', 'payment-delete',
            'news-create', 'news-read', 'news-update', 'news-delete',
            'report-read', 'report-export',
            'website-config-create', 'website-config-read', 'website-config-update', 'website-config-delete',
        ];

        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName]);
        }

        $adminKoordinator->givePermissionTo([
            'users-create', 'users-read', 'users-update', 'users-delete',
            'service-create', 'service-read', 'service-update', 'service-delete',
            'website-config-create', 'website-config-read', 'website-config-update', 'website-config-delete',
        ]);

        $adminFinance->givePermissionTo([
            'bills-create', 'bills-read', 'bills-update', 'bills-delete',
            'payment-create', 'payment-read', 'payment-update',
            'report-read', 'report-export',
        ]);

        $teknisi->givePermissionTo([
            'complain-create', 'complain-read', 'complain-update', 'complain-delete',
        ]);

        $pelanggan->givePermissionTo([
            'payment-create', 'payment-read', 'payment-update',
            'complain-create', 'complain-read', 'complain-update', 'complain-delete',
        ]);

        $superadmin->givePermissionTo([$permissions]);

        Schema::enableForeignKeyConstraints();
    }
}