<?php 

namespace App\Controllers;
use App\Models\BukuModel;
use Exception;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index(): string
    {
        $buku = $this->bukuModel->getBuku();

        $data = [
            'title' => 'Daftar Buku',
            'buku' => $buku,
        ];

        return view('buku/index', $data);
    }

    public function detail ($slug) {
        $data = [
            'title' => 'Detail Buku',
            'buku' => $this->bukuModel->getBuku($slug),
        ];

        // cek jika buku tidak ada
        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik ' . $slug . ' tidak ditemukan');
        } 

        return view('buku/detail', $data);
    }

    public function create () {
        // session(); // mengambil pesan kesalahan/validasi dari session
        $data = [
            'title' => 'Form Tambah Data Buku',
            'validation' => \Config\Services::validation(),
        ];

        return view('buku/create', $data);
    }

    // mengelola dan validasi data yang dikirim dari buku/create 
    public function save () {
        // validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => '{field} buku harus diisi',
                    'is_unique' => '{field} buku sudah terdaftar',
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi',
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi',
                ]
            ],
            'tahun_terbit' => [
                'rules' => 'required|greater_than[1901]|less_than_equal_to[2025]',
                'errors' => [
                    'required' => 'tahun terbit buku harus diisi dari tahun 1800 - 2025',
                    'greater_than_equal_to[1901]' => 'tahun terbit buku harus lebih dari tahun 1901',
                    'less_than_equal_to[2025]' => 'tahun terbit buku harus lebih dari tahun 1800',
                ]
            ]
        ])) { // jika tidak valid
            // pesan kesalahan
            $validation = \Config\Services::validation();

            // input pengguna dan validasi yang didapat akan dikembalikan menjadi pesan
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        // slug dari input judul buku 
        $slug = url_title($this->request->getVar('judul'), '-', true);
        
        // data diambil per key dan dikirim ke model
        $this->bukuModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
        ]);

        // flash data
        session()->setFlashdata('pesan', 'Buku berhasil ditambahkan...');

        return redirect()->to('/buku');
    }

    public function delete ($id) {
        $this->bukuModel->delete($id);
        // flash data
        session()->setFlashdata('pesan', 'Buku berhasil dihapus...');
        return redirect()->to('/buku');
    }

    public function edit ($slug) {
        $data = [
            'title' => 'Form Edit Data Buku',
            'validation' => \Config\Services::validation(),
            'buku' => $this->bukuModel->getBuku($slug),
        ];

        return view('buku/edit', $data);
    }

    public function update ($id) {
        // validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[buku.judul,id,' . $id . ']',
                'errors' => [
                    'required' => '{field} buku harus diisi',
                    'is_unique' => '{field} buku sudah terdaftar',
                ]
            ],
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi',
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} buku harus diisi',
                ]
            ],
            'tahun_terbit' => [
                'rules' => 'required|greater_than[1901]|less_than_equal_to[2025]',
                'errors' => [
                    'required' => 'tahun terbit buku harus diisi dari tahun 1800 - 2025',
                    'greater_than_equal_to[1901]' => 'tahun terbit buku harus lebih dari tahun 1901',
                    'less_than_equal_to[2025]' => 'tahun terbit buku harus lebih dari tahun 1800',
                ]
            ]
        ])) { // jika tidak valid
            // pesan kesalahan
            $validation = \Config\Services::validation();

            // input pengguna dan validasi yang didapat akan dikembalikan menjadi pesan
            return redirect()->to('/buku/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        // slug dari input judul buku 
        $slug = url_title($this->request->getVar('judul'), '-', true);
        
        // data diambil per key dan dikirim ke model
        $this->bukuModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
        ]);

        // flash data
        session()->setFlashdata('pesan', 'Buku berhasil diubah...');

        return redirect()->to('/buku');
    }
}