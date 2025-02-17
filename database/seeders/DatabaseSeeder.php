<?php

namespace Database\Seeders;

use App\Models\User;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'role_id' => 1,
        ]);

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
    }
}
