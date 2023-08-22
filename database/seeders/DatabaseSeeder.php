<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'status' => 'admin',
            'email' => 'admin@gmail.com',
            'nohp' => '62846759232',
            'atas_nama' => 'admin admin',
            'jenis_rek' => 'bri',
            'norek' => '0112371122',
            'alamat' => 'cibogo',
            'password' => bcrypt('admin'),
        ]);

        User::create([
            'name' => 'Kevin Abhista',
            'username' => 'Kevin',
            'status' => 'penyewa',
            'email' => 'kevinabhista@gmail.com',
            'nohp' => '6282118217076',
            'atas_nama' => 'Kevin Abhista',
            'jenis_rek' => 'BCA',
            'norek' => '055667788',
            'alamat' => 'Subang',
            'password' => bcrypt('12345'),
        ]);

        User::create([
            'name' => 'Dandi Agustian',
            'username' => 'Dandi',
            'status' => 'pemilik',
            'email' => 'dandiagustian@gmail.com',
            'nohp' => '628975609534',
            'atas_nama' => 'Dandi Agustian',
            'jenis_rek' => 'BRI',
            'norek' => '099775546',
            'alamat' => 'Subang',
            'password' => bcrypt('12345'),
        ]);

        Kategori::create([
            'nama' => 'PT Youme',
            'slug' => 'pt-youme',
            'alamat' => 'Cipaku'
        ]);

        Kategori::create([
            'nama' => 'Dahana',
            'slug' => 'dahana',
            'alamat' => 'Cibogo'
        ]);

        Kategori::create([
            'nama' => 'Politeknik Negeri Subang',
            'slug' => 'politeknik-negeri-subang',
            'alamat' => 'Cibogo'
        ]);
    }
}
