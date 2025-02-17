<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat data role Super Admin
        DB::table('roles')->insert([
            'role' => 'Super Admin',
        ]);

        // Buat data user Super Admin dengan role Super Admin
        $role = Role::where('role', 'Super Admin')->first();
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@admin.com',
            'password' => Hash::make('12345678'),
            'role_id' => $role['id'],
        ]);

        // Buat data permissions
        DB::table('permissions')->insert([
            'permission' => 'dashboard',
        ]);

        DB::table('permissions')->insert([
            'permission' => 'skm',
        ]);
        DB::table('permissions')->insert([
            'permission' => 'hasil_skm',
        ]);
        DB::table('permissions')->insert([
            'permission' => 'kelola_data_layanan',
        ]);
        DB::table('permissions')->insert([
            'permission' => 'kelola_data_pertanyaan',
        ]);
        DB::table('permissions')->insert([
            'permission' => 'simulasi',
        ]);

        DB::table('permissions')->insert([
            'permission' => 'data_pengguna_dan_hak_akses',
        ]);
        DB::table('permissions')->insert([
            'permission' => 'data_pengguna',
        ]);
        DB::table('permissions')->insert([
            'permission' => 'kelola_hak_akses',
        ]);

        // Buat data role_permission untuk role Super Admin (semua permission tersedia sejak awal untuk Super Admin)
        $permissions = Permission::all();
        if (count($permissions) > 1) {
            foreach ($permissions as $key => $value) {
                DB::table('role_permission')->insert([
                    'role_id' => $role['id'],
                    'permission_id' => $value['id'],
                ]);
            }
        }
    }
}
