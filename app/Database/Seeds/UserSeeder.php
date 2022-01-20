<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => password_hash('12345678', PASSWORD_BCRYPT),
                'nama' => 'Administrator',
                'level' => ['admin'],
                'is_aktif' => ['1'],
                'created_at' => Time::now()
            ],
            [
                'username' => 'kasir',
                'password' => password_hash('12345678', PASSWORD_BCRYPT),
                'nama' => 'Cashier',
                'level' => ['kasir'],
                'is_aktif' => ['1'],
                'created_at' => Time::now()
            ],
            [
                'username' => 'owner',
                'password' => password_hash('12345678', PASSWORD_BCRYPT),
                'nama' => 'Fadhil',
                'level' => ['owner'],
                'is_aktif' => ['1'],
                'created_at' => Time::now()
            ],
            [
                'username' => 'chef',
                'password' => password_hash('12345678', PASSWORD_BCRYPT),
                'nama' => 'Chef',
                'level' => ['chef'],
                'is_aktif' => ['1'],
                'created_at' => Time::now()
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
