<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'tipo' => 'admin',
                'status' => 1,
                'email' => 'admin1@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('10203040'),
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Cliente',
                'tipo' => 'cliente',
                'status' => 1,
                'email' => 'cliente1@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('10203040'),
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Entregador',
                'tipo' => 'entregador',
                'status' => 1,
                'email' => 'entregador1@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('10203040'),
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Conferente',
                'tipo' => 'conferente',
                'status' => 1,
                'email' => 'conferente1@email.com',
                'email_verified_at' => now(),
                'password' => Hash::make('10203040'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
