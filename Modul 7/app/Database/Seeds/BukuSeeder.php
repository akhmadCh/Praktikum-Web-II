<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BukuSeeder extends Seeder
{
    public function run()
    {
        $judul = 'Oppenheimer';

        $data = [
            'judul'        => $judul,
            'slug'         => url_title($judul, '-', true), // hasil: atomic-habits
            'penulis'      => 'Christopher Nolan',
            'penerbit'     => 'Erlangga, Charles River Editors, Knopf, dan Dahmani Limited',
            'tahun_terbit' => 2002,
            'created_at'   => Time::now(),
            'updated_at'   => Time::now(),
        ];

        // // Simple Queries
        // $this->db->query('INSERT INTO users (username, email, password) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('buku')->insert($data);
    }
}