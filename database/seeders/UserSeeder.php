<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => '2024-11-16 20:06:36',
                'dob' => '2024-11-15',
                'number' => 8420667334,
                'address' => 'no',
                'designation' => 'developer',
                'role' => 'superadmin',
                'password' => '$2y$12$.ImTxlpjgULLQLvZVtiOVu5gBoYHFnSPdlehIp.2eLu/4Qh7QCGHm',
                'remember_token' => 'tjppjrK36s3P8H0OWbufQMCUQJHsQLTZPR4bgheqQfw0voydrz4X9Ff2nRcE',
                'created_at' => '2024-11-16 20:06:10',
                'updated_at' => '2024-11-16 20:06:36',
            ],
            [
                'id' => 2,
                'name' => 'Hodol Kutkut',
                'email' => 'hodol@hodol.com',
                'email_verified_at' => '2024-11-16 21:50:57',
                'dob' => '2024-11-10',
                'number' => 9999888822,
                'address' => 'nowhere',
                'designation' => 'developer',
                'role' => 'worker',
                'password' => '$2y$12$Wn7NFGT5X2ojTzL29rwufOGukvQj7EF3Q4lRY/.rygkiIFifCoUa6',
                'remember_token' => NULL,
                'created_at' => '2024-11-16 21:50:30',
                'updated_at' => '2024-11-16 21:50:57',
            ],
            [
                'id' => 3,
                'name' => 'Arnab Sen',
                'email' => 'arnab3041999@gmail.com',
                'email_verified_at' => '2024-12-17 00:28:45',
                'dob' => '2024-07-20',
                'number' => 9999888822,
                'address' => 'Durga-Pithuri Lane',
                'designation' => '2d_artist',
                'role' => 'manager',
                'password' => '$2y$12$4ZICLkBW0s7rWL1T8zy6N.4fXpi1rkdXzZHT.L/g0atDRoh.GuT3q',
                'remember_token' => NULL,
                'created_at' => '2024-12-17 00:17:41',
                'updated_at' => '2024-12-17 00:28:45',
            ],
            [
                'id' => 4,
                'name' => 'Sumit Ghosh',
                'email' => 'sumit@ghosh.com',
                'email_verified_at' => '2024-12-17 00:30:19',
                'dob' => '2024-12-05',
                'number' => 9998887776,
                'address' => 'Tehatta',
                'designation' => '3d_artist',
                'role' => 'manager',
                'password' => '$2y$12$7THdiuO7OT0Gxxk5g880/eahYB/kddP3SfaVl3nEDuHJNncQWB3cy',
                'remember_token' => NULL,
                'created_at' => '2024-12-17 00:29:54',
                'updated_at' => '2024-12-17 00:30:19',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
