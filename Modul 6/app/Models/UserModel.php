<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel {
    public function getData (): array {
        return [
            'nama' => 'Akhmad Chaidar Ananda',
            'nim' => '2310817110015',
            'email' => 'chaidarmerak1966@gmail.com',
            'jurusan' => 'Teknologi Informasi',
            'hobby' => 'Bermain bola, membaca buku, dan menonton film'
        ];
    }
}