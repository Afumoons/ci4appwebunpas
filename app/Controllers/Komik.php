<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }
    public function index()
    {
        // $komik = $this->komikModel->findAll();
        $data = [
            'title' => 'Home',
            'komik' => $this->komikModel->getKomik()
        ];

        // $komikModel=new \App\Models\KomikModel()

        return view('komik/index', $data);
    }
    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik ' . $slug . ' tidak ditemukan.');
        }
        return view('komik/detail', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Form tambah data komik',
            'validation' => \config\Services::validation()
        ];
        return view('komik/create', $data);
    }
    public function save()
    {
        //Validasi
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'is_unique' => '{field} komik harus unik.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} terlalu besar.',
                    'is_image' => '{field} yang anda pilih bukan gambar.',
                    'mime_in' => '{field} yang anda pilih bukan file gambar.'
                ]
            ]
        ])) {
            // $validation = \config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/komik/create')->withInput();
        }

        //ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        //apakah tidak ada gambar yang diupload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            //Generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
            //ambil nama file sampul
            // $namaSampul = $fileSampul->getName();
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul,
        ]);
        session()->setFlashdata('pesan', 'Komik Ditambahkan.');
        return redirect()->to('/komik');
    }
    public function delete($id)
    {
        // cari gambar berdasarkan id
        $komik = $this->komikModel->fid($id);

        // cek jika file gambarnya default.jpg
        if ($komik['sampul'] != 'default.jpg') {
            // Hapus file di directory
            unlink('img/' . $komik['sampul']);
        }

        // Hapus di db
        $this->komikModel->delete($id);
        session()->setFlashdata('pesan', 'Komik Dihapus.');
        return redirect()->to('/komik');
    }
    public function edit($slug)
    {
        $data = [
            'title' => 'Form ubah data komik',
            'validation' => \config\Services::validation(), 'komik' => $this->komikModel->getKomik($slug)
        ];
        return view('komik/edit', $data);
    }
    public function update($id)
    {
        //Validasi

        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[komik.judul]';
        }
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'is_unique' => '{field} komik harus unik.'
                ]
            ], 'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} terlalu besar.',
                    'is_image' => '{field} yang anda pilih bukan gambar.',
                    'mime_in' => '{field} yang anda pilih bukan file gambar.'
                ]
            ]
        ])) {
            // $validation = \config\Services::validation();
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');

        //cek gambar, apakah tetap gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            //generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan gambar
            $fileSampul->move('img', $namaSampul);
            //hapus file lama
            unlink('img/' . $this->request->getVar('sampulLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'Komik Diubah.');
        return redirect()->to('/komik');
    }
}
